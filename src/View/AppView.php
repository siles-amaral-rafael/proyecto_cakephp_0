<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * @link https://book.cakephp.org/5/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->loadHelper('Authentication.Identity');
        $this->loadHelper('Form', [
            'errorClass' => 'is-invalid',
            'templates' => [
                'inputContainer' => '<div class="mb-3 {{type}}{{required}}">{{content}}</div>',
                'inputContainerError' => '<div class="mb-3 {{type}}{{required}}">{{content}}{{error}}</div>',
                'label' => '<label class="form-label"{{attrs}}>{{text}}</label>',
                'error' => '<div class="invalid-feedback">{{content}}</div>',
                'input' => '<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}>',
                'select' => '<select name="{{name}}" class="form-select"{{attrs}}>{{content}}</select>',
                'textarea' => '<textarea name="{{name}}" class="form-control"{{attrs}}>{{value}}</textarea>',
                'button' => '<button type="{{type}}" class="btn btn-primary"{{attrs}}>{{text}}</button>',
                'submitContainer' => '<div class="mb-0">{{content}}</div>',
            ],
        ]);
        $this->loadHelper('Paginator', [
            'templates' => [
                'nextActive' => '<li class="page-item"><a class="page-link" rel="next" href="{{url}}">{{text}}</a></li>',
                'nextDisabled' => '<li class="page-item disabled"><span class="page-link">{{text}}</span></li>',
                'prevActive' => '<li class="page-item"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
                'prevDisabled' => '<li class="page-item disabled"><span class="page-link">{{text}}</span></li>',
                'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'current' => '<li class="page-item active" aria-current="page"><span class="page-link">{{text}}</span></li>',
                'ellipsis' => '<li class="page-item disabled"><span class="page-link">&hellip;</span></li>',
                'sort' => '<a class="text-decoration-none link-dark fw-medium" href="{{url}}">{{text}}</a>',
                'sortAsc' => '<a class="text-decoration-none link-primary fw-semibold" href="{{url}}">{{text}} <span class="text-muted">▲</span></a>',
                'sortDesc' => '<a class="text-decoration-none link-primary fw-semibold" href="{{url}}">{{text}} <span class="text-muted">▼</span></a>',
                'sortAscLocked' => '<a class="text-decoration-none link-secondary fw-semibold" href="{{url}}">{{text}} <span class="text-muted">▲</span></a>',
                'sortDescLocked' => '<a class="text-decoration-none link-secondary fw-semibold" href="{{url}}">{{text}} <span class="text-muted">▼</span></a>',
            ],
        ]);
    }
}
