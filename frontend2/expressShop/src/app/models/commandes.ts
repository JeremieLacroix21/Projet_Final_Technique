import { CommandesItems } from './commandesItems';

export class Commandes {
    idCommande : number;
    idFournisseur: number;
    nomFournisseur: string;
    idDistributeur: number;
    dateCreation: string;
    complete: number;
    EstOuvert : boolean;
    EmailFournisseur : string;
    telephone : string;
    TableItem : CommandesItems[]
    constructor() { 
    }
}