import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

/*
  Generated class for the InventarioService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class InventarioService {

  constructor(public http: Http) {
    console.log('Hello InventarioService Provider');
  }

  getAll(){
	 

	 return new Promise(resolve => {
    this.http.get('https://menu99.000webhostapp.com/Resfull/all')
    .map(res => res.json())
    .subscribe(
      data=>{
      resolve(data);
      },
      error=>{
     console.log(error);

      });
    })

}

   

}
