import { Injectable } from '@angular/core';
import { HttpParams, HttpClient } from '@angular/common/http';
import { config } from '../../config';
import { Product } from '../models/product';
import { Subject } from 'rxjs';
import { map } from 'rxjs/operators';
import { Commandes } from '../models//commandes';
import {formatDate} from '@angular/common';
import { CommandesItems } from '../models/commandesItems';

@Injectable({
    providedIn: 'root'
  })
export class CommandeService {

    constructor(private http: HttpClient) {}

    GetCommande(idDistributeur, Encours){
        const body = new HttpParams().set('idDistributeur', idDistributeur.toString())
        .set('Encours', Encours);
    return this.http.post<Commandes[]>(
      `${config.apiUrl}/api/GetCommandeDistributeur`, body.toString(),
      config.headerObject);
    }

    
    GetFournisseur(idFournisseur){
      const body = new HttpParams().set('idFournisseur', idFournisseur.toString())
  return this.http.post(
    `${config.apiUrl}/api/GetFournisseur`, body.toString(),
    config.headerObject);
  }

  GetItems(idcommande){
    const body = new HttpParams().set('idCommande', idcommande.toString())
return this.http.post<CommandesItems[]>(
  `${config.apiUrl}/api/GetItems`, body.toString(),
  config.headerObject);
}
}