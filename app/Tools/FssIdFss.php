<?php
namespace App\Tools;
use App\Tools\Middlewares\Request;
use App\Tools\Middlewares\IDelegate;
use Illuminate\Contracts\Support\Jsonable;

/**
 * 
 */
class FssIdFss extends Tool {

    /**
     * @var Tool l'instance de l'outil
     */
    private static $instance = null;
    /**
     * @var Tools le gestionnaires des outils
     */
    private $tools;

    public function __construct($tools){   
        parent::__construct();
        self::$instance = $this;
        $this->tools = $tools;
        ##construct
    }
    /**
     * alias _exec
     * @param Tools $tools les gestionnaire des outils
     */
    public static function exec($tools)
    {
        return self::instance($tools)->_exec('');
    }
    /**
     * permet de retournner l'instance de la classe
     */
    public static function instance($tools){
        if(is_null(self::$instance)){
            new FssIdFss($tools);
        }else{
            self::$instance->tools = $tools;
        }
        return self::$instance;
    }
    /**
     * permet de demarer l'execution
     * @param Tools $tools les gestionnaire des outils
     */

    public function __invoke($tools){
        $this->tools  = $tools;
        $this->_exec();
    }

    /**
     * permet de demarer l'execution
     */

    public function _exec($data){
        //throw Error("je ne support pas cette methode");
        return $this;
        //throw new \Error("je ne support pas cette methode");
    }

    /**
     * permet de fournir un identifiant d'un fournisseur par sms
     * @param int $idActeur l'identifiant de l'acteur qui demande l'identifiant du fournisseur
     * @param int $idIntrant l'identifiant de l'intrant demandé
     * @return FssIdFss cet objet
     */
    public function bySMS(int $idActeur, int $idIntrant){
        /*$factModels = $this->tools->getFactModels();
        $intr = $factModels->exec("intrant")->find($idIntrant);
        $act = $factModels->exec("acteur")->find($idActeur);
        $sectOuCom = $act->secteur_ou_commune;
        //dd($sectOuCom);
        if($sectOuCom == null){
            throw new \Error("je ne support pas cette methode");
        }
        $fssIntrs = $intr->getFssIntrantBySectOuCom($sectOuCom->id);
        //Extraction de l'identifiant du fournisseur du manière aléatoire
        $idFssAlea = rand(0, count($fssIntrs)-1);
        $fssAlea = $fssIntrs[$idFssAlea];
        $vueIdFss = new VueIdFss($fssAlea);*/
        $vueIdFss = $this->getVueIdFss($idActeur, $idIntrant);
        //dd($vueIdFss->sms()->toJson());
        return $vueIdFss->sms();
    }

    /**
     * permet de fournir un identifiant d'un fournisseur par http direct
     * @param int $idActeur l'identifiant de l'acteur qui demande l'identifiant du fournisseur
     * @param int $idIntrant l'identifiant de l'intrant demandé
     * @return FssIdFss cet objet
     */
    public function byDirect(int $idActeur, int $idIntrant)
    {
        $vueIdFss = $this->getVueIdFss($idActeur, $idIntrant);
        //dd($vueIdFss->sms()->toJson());
        return $vueIdFss->direct();
    }

    /**
     * permet de retorner un objet qui permet de presenter l'identifiant selon le cas d'utilisation
     * @param int $idActeur l'identifiant de l'acteur qui demande l'identifiant du fournisseur
     * @param int $idIntrant l'identifiant de l'intrant demandé
     * @return VueIdFss cet objet
     */
    public function getVueIdFss(int $idActeur, int $idIntrant)
    {
        $factModels = $this->tools->getFactModels();
        $intr = $factModels->exec("intrant")->find($idIntrant);
        $act = $factModels->exec("acteur")->find($idActeur);
        $sectOuCom = $act->secteur_ou_commune;
        //dd($sectOuCom);
        if($sectOuCom == null){
            throw new \Error("je ne support pas cette methode");
        }
        $fssIntrs = $intr->getFssIntrantBySectOuCom($sectOuCom->id);
        //Extraction de l'identifiant du fournisseur du manière aléatoire
        $idFssAlea = rand(0, count($fssIntrs)-1);
        //dump($idFssAlea);
        $fssAlea = $fssIntrs[$idFssAlea];
        //dd($fssAlea->getAppelToArray());
        $vueIdFss = new VueIdFss($fssAlea);
        return $vueIdFss;
    }

    /**
     * permet de declencher l'execution d'un middleware
     * @param Request $request la requette
     * @param IDelegate $delegate 
     * @return Void
     */
    public function process($request, $delegate){
        throw new \Error("je ne support pas cette methode");
        
    }


}
/**
 * permet de presenter l'identifiant selon le cas d'utilisation
 */
class VueIdFss  implements Jsonable
{
    /**
     * @var
     */
    const SMS = 1;
    /**
     * @var
     */
    const DIRECT = 2;
    /**
     * @var int
     */
    private $state;
    /**
     * @param Model
     */
    public function __construct($fss) {
        $this->fss = $fss;
        $this->state = self::DIRECT;
    }


    /**
     * Convert the model instance to JSON.
     *
     * @param  int  $options
     * @return string
     *
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);
        //dd($json);
        return $json;
    }
    /**
     * permet de configurer l'objet pour le cas d'utilisation `sms`
     */
    public function sms() : VueIdFss
    {
        $this->state = self::SMS;
        return $this;
    }
    /**
     * permet de configurer l'objet pour le cas d'utilisation `sms`
     */
    public function direct() : VueIdFss
    {
        $this->state = self::DIRECT;
        return $this;
    }

    /**
     * permet de convertir l'objet à un tableau
     */
    public function jsonSerialize()
    {
        //$rep = [];
        //dd($this->state);
        if($this->state == self::DIRECT){
            return $this->fss->getAppelToArray();
            //throw new \Error("je ne support pas cette methode");

        }elseif($this->state == self::SMS){
            
            return ["msg"=>json_encode($this->fss->getAppelToArray())];
            //throw new \Error("je ne support pas cette methode");

        }else {
            
            throw new \Error("je ne support pas cette methode");
        }
    }

}
