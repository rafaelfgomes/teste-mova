<?php

namespace App\Objects;

class Message
{
    public const LIST = [
        WeekDay::SUNDAY => [
            'Aprendi que não devo me importar com comentários que não vão mudar minha vida.',
            'Quem vive nas trevas não consegue ser visto, nem vê nada.',
        ],
        WeekDay::MONDAY => [
            'A vida é feita de movimento. Mesmo quando estamos parados, algo sempre está acontecendo ao nosso redor.',
            'O mundo está nas mãos daqueles que têm a coragem de sonhar e correr o risco de viver seus sonhos.',
        ],
        WeekDay::TUESDAY => [
            'Seja feliz neste momento. Este momento é a sua vida.',
            'Falhar outra vez. Falhar melhor.',
        ],
        WeekDay::WEDNESDAY => [
            'O mais importante na vida não é número de vezes que você cai, mas o número de vezes que está disposto a se levantar e tentar de novo!',
            'Apaixona-se por quem trata você como você gosta de ser tratado.',
        ],
        WeekDay::THURSDAY => [
            'Cada amanhecer é feito de novidade e oportunidade.',
            'Você só vive uma vez, mas se você viver certo, uma vez é o bastante.',
        ],
        WeekDay::FRIDAY => [
            'Às vezes, depois de tudo dar errado, a vida prova que tinha planos melhores para a gente.',
            'A tarefa de viver é dura, mas fascinante.',
        ],
        WeekDay::SATURDAY => [
            'A vida não é encontrar a si mesmo. A vida é criar a si mesmo.',
            'Gosto de fazer as pessoas felizes, especialmente quando estou triste.',
        ]
    ];
}