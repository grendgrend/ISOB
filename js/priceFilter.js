import abstructFilter from './galleryFilter.js';
/* Класс фильтров по интервалам цен */

export default class priceFilter extends abstructFilter{
    constructor (event,selector,selectorType){
        super(event,selector,selectorType);
        this.currentValueFrom='';
        this.priceFromId="priceFrom";
        this.currentValueTo='';
        this.priceToId="priceTo";
        this.className='priceFilter';
    }
    setCurrentValue (event){
        (event.currentTarget.id==this.priceFromId) ? this.currentValueFrom=event.currentTarget.value : this.currentValueTo = event.currentTarget.value;
        console.log(this.getCurrentValue());
    }
    getCurrentValue (){
        return [this.currentValueFrom, this.currentValueTo];
    }
}