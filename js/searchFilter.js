import abstructFilter from './galleryFilter.js';
/* Класс фильтров по словам */

export default class searchFilter extends abstructFilter{
    constructor (event,selector,selectorType){
        super(event,selector,selectorType);
        this.currentValue='';
        this.className='searchFilter';
    }
    setCurrentValue (event){
        this.currentValue=event.currentTarget.value;
        console.log(this.getCurrentValue());
    }
    getCurrentValue (){
        return this.currentValue;
    }

}