import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { InventarioService } from '../../providers/inventario-service';



@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  Datos;

  constructor(public navCtrl: NavController,public servicio: InventarioService) {

   this.servicio.getAll()
   .then(
      data =>{
         console.log(data);
         this.Datos=data;
        }
     ).catch(

       error =>{
         console.log(error);
        }

     )

  }

}
