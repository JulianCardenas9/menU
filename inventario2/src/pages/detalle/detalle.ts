import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Editar } from '../editar/editar';
import { Eliminar } from '../eliminar/eliminar';
/**
 * Generated class for the Detalle page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-detalle',
  templateUrl: 'detalle.html',
})
export class Detalle {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  let item = this.navParams.get('item');
  console.log(item);
  }
  onEditar(){

   this.navCtrl.push(Editar);
   }

   onEliminar(){

   this.navCtrl.push(Eliminar);
   }
  
  ionViewDidLoad() {
    console.log('ionViewDidLoad Inventario');
  }

}