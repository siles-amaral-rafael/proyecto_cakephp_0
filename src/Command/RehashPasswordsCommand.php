<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Datasource\FactoryLocator;

/**
 * Convierte contraseñas almacenadas en texto plano a hash bcrypt (uso puntual).
 */
class RehashPasswordsCommand extends Command
{
    /**
     * @inheritDoc
     */
    public static function defaultName(): string
    {
        return 'user rehash_passwords';
    }

    /**
     * @param \Cake\Console\Arguments $args Arguments
     * @param \Cake\Console\ConsoleIo $io Io
     * @return int|null
     */
    public function execute(Arguments $args, ConsoleIo $io): ?int
    {
        $table = FactoryLocator::get('Table')->get('Users');
        $users = $table->find()->all();
        $updated = 0;
        foreach ($users as $user) {
            $stored = $user->password;
            if ($stored === null || $stored === '' || str_starts_with((string)$stored, '$2y$')) {
                continue;
            }
            $plain = (string)$stored;
            $user->password = $plain;
            if ($table->save($user, ['checkRules' => false])) {
                $updated++;
                $io->out(sprintf('Usuario id %s: contraseña rehasheada.', $user->id));
            }
        }
        $io->success(sprintf('Listo. Registros actualizados: %d', $updated));

        return static::CODE_SUCCESS;
    }
}
