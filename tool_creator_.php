#!/usr/bin/env php
<?php
//[a-z]\[a-b_]*
//print($argv[1]);
//var_dump(preg_match("#[a-z][a-b0-9_]*#", $argv[1]));
/**
 * permet de verifier si le nom de l'outil est valide 
 */
function nameToolValid(string $nameTool){
    if(preg_match("#^[a-z]([a-z0-9_])*$#", $nameTool)<=0){

        return false;

    }
    return true;

};
//throw new Exception("l'argument inscrit doit commencer par une lettre minuscule et contenir que de lettre minuscules, des chiffres et des undescore");
//throw new Exception("cet outil existe deja");
/**
 * permet de mettre en forme le nom d'un outil
 */
function metEnForm($nameTool){
    $name = "";
    foreach (explode("_",$nameTool) as $key => $value) {
        $name .=ucfirst($value);
    }
    return $name;
}
/**
 * permet de creer un outil, s'il existe déja un outil qui a ce nom il retourne une exception
 * @param string $name le nom du fichier
 * @return bool faux s'il l'outil existe déja vrai dans les autre cas
 */
function createTool(string $namefile, $code=null){
    $dir = "app/Tools/";
    /*$name = "";
    foreach (explode("_",$namefile) as $key => $value) {
        $name .=ucfirst($value);
    }*/
    //var_dump('rrrrrr');
    $name = metEnForm($namefile);
    $namefile = $dir.$name.".php";
    if(file_exists($namefile) != ""){
        return false;
    }
    $file = fopen("app/Tools/example.php", "r");
    $i=0;
    $ligne="";
    $data="";
    while($ligne!="" || $i==0){
        $ligne = fgets($file);
        $data .= $ligne;
        $i++;
    }
    //print($data);
    fclose($file);
    $file = fopen($namefile, "a");
    $data = str_replace("ExempleTool",$name, $data);
    if(is_null($code)){
        $data = str_replace("##code",'throw new \Error("je ne support pas cette methode");', $data);###code
    }else {
        $data = str_replace("##code",$code, $data);
        $data = str_replace("##construct",'$this->dispatch = Tools::newDispath();', $data);
    }
    //print($data);
    fputs($file,$data);
    fclose($file);
    print("l'outil ".$name." est creé \n");
    return true;
};
if($argc <=1 ){
    print("vous devez inscrire au moins un argument\n(ex. php tool_creator fab_models) ");
}else {
    $mess = " inscrit doit commencer par une lettre minuscule et 
                contenir que de lettre minuscules, des chiffres et des undescore\n";
    if(!nameToolValid($argv[1])){
        print("Le nom de l'outil n'est pas valide. Le nom ".$mess);
        exit(1);
    }
    $code = null;
     if($argc > 2){
        $compos = explode(",", $argv[2]);
        foreach ($compos as $key => $value) {
            if(!nameToolValid($value)){
                print("le nom du composant numero ".$key." n'est pas valide. Le composant".$mess);
                exit(1);
            }
        }
        $code = "return \$this->dispatch\n";
        foreach ($compos as $value) {
            createTool($value);
            $code.=("\t\t\t\t\t\t->pipe(".metEnForm($value)."::instance())\n");
        }
        $code .= "\t\t\t\t\t\t->process();"; 

     }
     if(!createTool($argv[1], $code)){
         print("l'outil existe déjà\n");
     }

}
    