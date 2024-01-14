<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    // Relacionamento para respostas desta resposta
    public function replies()
    {
        return $this->hasMany(Answer::class, 'parent_answer_id'); // Ajuste a chave estrangeira conforme necessário
    }

    // Relacionamento para a resposta pai (se houver)
    public function parentAnswer()
    {
        return $this->belongsTo(Answer::class, 'parent_answer_id'); // Ajuste a chave estrangeira conforme necessário
    }

    // Relacionamento para o usuário que fez esta resposta
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
