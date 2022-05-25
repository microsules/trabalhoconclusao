<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'category_id' => 1,
                'title' => 'Inter x Corintians',
                'summary' => 'Em jogo de quatro gols, Inter empata com o Corinthians',
                'text' => 'As principais chances da primeira etapa foram do Inter, que fez jus ao volume e o transformou em dois gols. 
                            Explorando o jogo em Wanderson na ponta-esquerda, o Inter ameaçou a meta de Cássio logo aos quatro minutos.
                            A conclusão de David, porém, foi defendida pelo goleiro. Nove minutos depois, David voltou a estar de frente 
                            com Cássio ao receber de De Pena. No entanto, escorregou e desperdiçou a chance de abrir do placar.',
                'active' => true,
                'url_image' => 'teste.jpg'
            ]
        ]);
    }
}
