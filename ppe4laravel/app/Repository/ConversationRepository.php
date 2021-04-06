<?php
namespace App\Repository;

use App\User;
use Illuminate\Support\Facades\Auth;

class ConversationRepository{
    /**
     * @var User
     */

     private $user;

     public function __construct(User $user)
     {
         $this->user = $user;
     }

     public function getConversations(int $userId){
         return $this->user->newQuery()
         ->where('id', '!=', $userId)
         ->get();
     }
}