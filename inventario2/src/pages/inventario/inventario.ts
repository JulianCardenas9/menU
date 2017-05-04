import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Detalle } from '../detalle/detalle';
import { Editar } from '../editar/editar';
import { Eliminar } from '../eliminar/eliminar';

/**
 * Generated class for the Inventario page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-inventario',
  templateUrl: 'inventario.html',
})
export class InventarioPage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  onClick(){
    this.navCtrl.push(Detalle,{item:'Primero'});

  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad Inventario');
  }

}
