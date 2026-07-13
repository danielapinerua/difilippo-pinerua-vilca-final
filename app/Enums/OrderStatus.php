<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDIENTE = 'pendiente';
    case PAGADO = 'pagado';
    case ENVIADO = 'enviado';
    case ENTREGADO = 'entregado';
    case CANCELADO = 'cancelado';
}