<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'telephone',
        'address',
        'houseNumber',
        'zipcode',
        'city',
        'accountOwner',
        'iban',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function register (Request $request)
    {
        $data = $request->only($this->fillable);
        $this->fill($data)->save();

        $paymentDataId = $this->makePayment($this);

        $this->paymentDataId = $paymentDataId;
        $this->save();
        return $this;
    }

    public function makePayment (User $user)
    {
        $client = new Client();
        $options = [
            'json' => [
                'customerId'    => $user->id,
                'iban'          => $user->iban,
                'owner'         => $user->accountOwner,
            ]
        ];
        /**
         * @var Response $response
         */
        $response = $client->post(env('API_PAYMENT_WUNDER'), $options);
        $response = json_decode($response->getBody()->getContents(), true);
        return $response['paymentDataId'];
    }
}
