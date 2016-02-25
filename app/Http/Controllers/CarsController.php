<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;

use App\Category;
use App\Car;
use App\Option;
use App\OptionCar;



class CarsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $opp = array();
        $categories = Category::all();
        $title = "Ajout voiture";
        $options = Option::all();
        foreach ($options as $o) {
            $opp[$o->id_category][$o->id] = $o->name;
        }
        return view('addCars', ['title' => $title, 'categories' => $categories, 'opp' => $opp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //--ADD CAR INFOS
       //dd($request);
       
        $createCar=Car::create($request->only([
                'model'=>'model',
                'picture'=>  json_encode($request->file('picture')),
                'video' => 'video',
                'basic_price'=>'basic_price'
                ]));
        $IdCar = $createCar->id; 
        //dd($IdCar);
        //--GET OPTIONS LIST
        $ch = $request->tab_option;
        $options = explode('-', $ch);
        
        //--ADD TO PRICE TABLE
        foreach ($options as $option) {
            if ($option != '0' && is_numeric(intval($option))) {
                $v = intval($option);
                $new_price = 'price-' . $option;
                if(isset($request->$new_price)){
                    DB::insert('insert into option_cars (id_car,id_option,option_price) values (?,?,?)', [$IdCar, $v, $request->$new_price]);
                }
            }
        }
        
         return redirect('cars/show/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $title = "voiture";
        
        $categories = array();
        
        if(isset($id) && !empty($id)){
            $car = Car::findOrFail($id);
            
            //--GET IDS OPTIONS FROM 'OPTION CARS TABLE'
            $option_ids = OptionCar::where('id_car', $car->id)->get();
            //dd($option_ids);
            
             //--GET CAR OPTIONS (NAME - DESC - ID CATEGORY)
           
            if(!empty($option_ids)){
                foreach ($option_ids as $id){
                   $options[$id['id_option']] = Option::findOrFail($id['id_option']);
                }
            }
  
           
            if(!empty($options[$id['id_option']])){
                //--GET LIST CATEGORIES NAME
                foreach($options as $option){
                    
                    $categories[$option['id_category']]['name'] = Category::findOrFail($option['id_category']);
                    $categories[$option['id_category']][$option['id']]['options-name'] = $option['name'];
                    $categories[$option['id_category']][$option['id']]['price'] =$option_ids[$id['id_option']]['option_price'];
                   
                }
            }
            //dd($categories);
            return view('car-details',[
                    'title' => $title,
                    'car' => $car,
                    'categories'=>$categories,
                    'options'=>$options,
                    'prices'=>$option_ids, 
                    
                   ]);
         }
        
    }
    
    /**
     * Display list cars.
     *
     */
    public function listcars() {
        $title = "List des voitures";
        
        $cars = Car::all();
        
        return view('list-cars', ['title' => $title, 'cars' => $cars]);
    }
    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
