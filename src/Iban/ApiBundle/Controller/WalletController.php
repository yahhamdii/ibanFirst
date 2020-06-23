<?php

namespace Iban\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Wallet controller.
 *
 * @Rest\Route(path="/api/wallet")
 */
class WalletController extends Controller
{

    /**
     * Lists all Wallet.
     *
     * @Rest\Get("", name="get_all_wallet")
     * @Rest\View(StatusCode = 200, serializerEnableMaxDepthChecks=true)
     */
    public function getAllAction()
    {
        $username = $this->getParameter('iban_login');
        $password = $this->getParameter('iban_password');
        $url = $this->getParameter('iban_url').'wallets/';
        
        $nonce="";
        $chars = "0123456789abcdef";
        for($i = 0; $i < 32; $i++) 
        {
             $nonce .= $chars[rand(0, 15)]; 
        }
        $nonce64 = base64_encode($nonce) ;
        $date = gmdate('c');
        $date = substr($date,0,19)."Z" ;
        $digest = base64_encode(sha1($nonce.$date.$password, true));
        $header = sprintf('X-WSSE: UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"',$username, $digest, $nonce64, $date);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch,CURLOPT_HTTPHEADER, array($header,'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        $res = curl_exec($ch);
        curl_close($ch);
        $json = json_encode(json_decode(explode("\r\n\r\n",$res)[1], true), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        

        return $json;
    }

}
