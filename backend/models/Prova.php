<php 

namespace app\models;

use yii;
use yii\backend

class Prova extends Model
{
	public $username;
	public $email;
	public $password;

	public function rules()
	{	
		return [
			[['name' , 'email' , 'password'] ,  'required'],
			['email', 'email'],
		];
	}
}


