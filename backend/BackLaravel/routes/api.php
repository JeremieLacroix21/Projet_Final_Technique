<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
 });
// Route Commande
 Route::get('GetLogs', 'API\CommandeController@GetLogs');

 //Route User
 Route::post('login', 'API\PassportController@login');
 Route::post('register', 'API\PassportController@register');
 Route::post('RecoverUsername', 'API\PassportController@RecoverUsername');
 Route::post('RecoverPassword', 'API\PassportController@RecoverPassword');
 Route::get('GetAllUsers', 'API\PassportController@GetAllUsers');
 Route::get('GetAllSuppliers', 'API\PassportController@GetAllSuppliers');
 Route::post('AddTag', 'API\PassportController@AddTag');
 Route::get('GetSuppliersAndDistributor', 'API\PassportController@GetSuppliersAndDistributor');
 Route::post('GetAllNotInConvSuppliers', 'API\PassportController@GetAllNotInConvSuppliers');
 
//Route Produit
 Route::get('GetAllProducts','API\ProduitController@GetAllProducts');
 Route::post('SearchProducts','API\ProduitController@SearchProducts');
 Route::post('AddProduct','API\ProduitController@AddProduct');
 Route::post('AddImage', 'API\ProduitController@AddImage');
 Route::post('InsertCommande', 'API\ProduitController@InsertCommande');
 Route::post('InsertCommandeItems', 'API\ProduitController@InsertCommandeItems');
 Route::post('EnvoieCommande', 'API\ProduitController@EnvoieCommande');
 Route::post('GetFournisseurParCommande', 'API\ProduitController@GetFournisseurParCommande');
 //route panier
 Route::post('GetpanierFromId','API\ProduitController@GetpanierFromId');
 Route::post('AddProductToPanier','API\ProduitController@AddProductToPanier');
 Route::post('countItemFromid','API\ProduitController@countItemFromid');
 Route::post('DeleteProductFromPanier','API\ProduitController@DeleteProductFromPanier');
 Route::post('UpdateQuantityPanier','API\ProduitController@UpdateQuantityPanier');
//Route Profil
 Route::post('/profil','API\ProfilController@GetUser');
 Route::post('GetUserInformation','API\ProfilController@GetUserInformation');
 Route::post('UpdatePassword','API\ProfilController@UpdatePassword');
 Route::post('UpdateUser','API\ProfilController@UpdateUser');
 Route::post('UpdateConfirmRegistration','API\ProfilController@UpdateConfirmRegistration');
 Route::post('DeleteUser','API\ProfilController@DeleteUser');
 Route::post('UpdateRating','API\ProfilController@UpdateRating');


 Route::post('AddOrDeleteFavoriteSuppliers','API\ProfilController@AddOrDeleteFavoriteSuppliers');
 Route::post('GetFavoriteSuppliers','API\ProfilController@GetFavoriteSuppliers');

 //Route Produit
 Route::post('UpdateProduct','API\ProduitController@UpdateProduct');
 //Route Commande

 Route::post('GetCommandeDistributeur','API\CommandeController@GetCommandeDistributeur');
 Route::post('CompleteCommande','API\CommandeController@CompleteCommande');
 Route::post('GetCommandeFournisseur','API\CommandeController@GetCommandeFournisseur');
 //Route About
 Route::post('EnvoieMessage','API\AboutController@EnvoieMessage');
//Route Middleware
 Route::group(['middleware' => 'auth:api'], function(){
 });


 Route::post('GetProductsByFournisseur','API\ProduitController@GetProductsByFournisseur');
 Route::post('DeleteProduct','API\ProduitController@DeleteProduct');