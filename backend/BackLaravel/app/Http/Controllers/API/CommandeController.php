<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function GetCommandeDistributeur(Request $request)
    {
        $arraycommandes = array("");
        $matchThese = ['commandes.idDistributeur' => $request['idDistributeur']];
        $commandes = DB::table('commandes')
        ->select('*')->where($matchThese)->get();  
        $i = 0;
        $data = [];
        foreach($commandes as $key => $value)
        {
            $Commande = DB::table('commandes')
             ->join('commandeItems', 'commandes.idCommande','=', 'commandeItems.idCommande')
             ->join('produits', 'commandeItems.idproduit','=', 'produits.idproduits')
             ->select('imgGUID','nom','prix','quantite','description')->where('commandes.idCommande', '=', $value->idCommande)->get();
            $Fournisseur = DB::table('users')
            ->select('iduser','nomutilisateur','adresse','email','Telephone')->where('iduser', '=',  $value->idFournisseur)->get();
            $new = (array) $Commande;
            $first_key = key($new);
            $new['TableItem'] = $new[$first_key];
            unset($new[$first_key]);
            $arraycommandes = (array)$value;
            $arraycommandes['nomFournisseur'] = $Fournisseur[0]->nomutilisateur; 
            $arraycommandes['EmailFournisseur'] =  $Fournisseur[0]->email; 
            $arraycommandes['telephone'] =  $Fournisseur[0]->Telephone; 
            $arrayfini = array_merge($arraycommandes,$new);
            $arraycommandes = array_merge($arrayfini , $arraycommandes);
            $data[$i] = $arrayfini;
            $i++;
        }
        return json_encode($data);
    }
    public function GetCommandeFournisseur(Request $request)
    {
        $arraycommandes = array("");
        $matchThese = ['commandes.idFournisseur' => $request['idFournisseur']];
        $commandes = DB::table('commandes')
        ->select('*')->where($matchThese)->get();  
        $i = 0;
        $data = [];
        foreach($commandes as $key => $value)
        {
            $Commande = DB::table('commandes')
             ->join('commandeItems', 'commandes.idCommande','=', 'commandeItems.idCommande')
             ->join('produits', 'commandeItems.idproduit','=', 'produits.idproduits')
             ->select('imgGUID','nom','prix','quantite','description')->where('commandes.idCommande', '=', $value->idCommande)->get();
            $Distributeur = DB::table('users')
            ->select('iduser','nomutilisateur','adresse','email','Telephone')->where('iduser', '=',  $value->idDistributeur)->get();
            $new = (array) $Commande;
            $first_key = key($new);
            $new['TableItem'] = $new[$first_key];
            unset($new[$first_key]);
            $arraycommandes = (array)$value;
            $arraycommandes['nomDistributeur'] = $Distributeur[0]->nomutilisateur; 
            $arraycommandes['EmailDistributeur'] =  $Distributeur[0]->email; 
            $arraycommandes['telephone'] =  $Distributeur[0]->Telephone; 
            $arrayfini = array_merge($arraycommandes,$new);
            $arraycommandes = array_merge($arrayfini , $arraycommandes);
            $data[$i] = $arrayfini;
            $i++;
        }
        return json_encode($data);
    }

    public function CompleteCommande(Request $request) {
        $results = DB::table('commandes')
        ->where([
            ['idCommande', '=', $request['idCommande']]
        ])
        ->update(['complete' => '1']);
        return json_encode($results);
    }

    public function GetLogs() {
        $request = DB::table('log_activites')
            ->select('username', 'type', 'timestamp', 'data')
            ->get();
        
        return json_encode($request);
    }
}