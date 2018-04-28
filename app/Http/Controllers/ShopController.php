<?php

namespace App\Http\Controllers;

use App\CardTemplate;
use App\Promotion;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /*------------ Promotion-combined Controller -----------*/
    public function isShopOwner($shop) {
        return true; //<<------------------------------- TRAP STATE FOR TEST
        if (\Auth::user()->id !== $shop->owner_id){
            return redirect('/');
        }
    }

    public function indexPromotion(Shop $shop){
        $this->isShopOwner($shop);

        $templates = CardTemplate::where('shop_id', $shop->id)->pluck('id')->toArray();
        $promotions = Promotion::whereIn('template_id', $templates)->get();

        return view('shops.promotion.index', compact('shop', 'promotions'));
    }

    public function showPromotion(Shop $shop, Promotion $promotion){
        $this->isShopOwner($shop);

        return view('shops.promotion.show', compact('shop','promotion'));
    }

    public function createPromotion(Shop $shop){
        $this->isShopOwner($shop);

        $cards = CardTemplate::where('shop_id', $shop->id)->pluck('name','id')->toArray();
        return view('shops.promotion.create', compact('shop', 'cards'));
    }

    public function storePromotion(Request $request, Shop $shop) {
        $request->validate([
            'reward_name' => ['required'],
            'reward_img' => ['required'],
            'condition' => ['required'],
            'template_id' => ['required'],
            'point' => ['required'],
            'exp_date' => ['required'],
            'exp_time' => ['required'],
        ]);

        if(!$request->hasFile('reward_img')){
            return redirect("/shops/{$shop->id}/promotion");
        }

        $image_name = $request->file('reward_img')->getClientOriginalName();
        Storage::disk('public')->put("promotions/$image_name", $image_name);


        $promotion = new Promotion;
        $promotion->reward_name = $request->input('reward_name');
        $promotion->reward_img = $image_name;
        $promotion->condition = $request->input('condition');
        $promotion->template_id = $request->input('template_id');
        $promotion->point = $request->input('point');
        $promotion->exp_date = $request->input('exp_date').' '.$request->input('exp_time');
        $promotion->save();
        return redirect("/shops/{$shop->id}/promotion/{$promotion->id}");
    }

    public function editPromotion(Shop $shop, Promotion $promotion) {
        $this->isShopOwner($shop);

        $cards = CardTemplate::where('shop_id', $shop->id)->pluck('name','id');
        return view('shops.promotion.edit', compact('shop','promotion', 'cards'));
    }

    public function updatePromotion(Request $request,Shop $shop, Promotion $promotion) {
        $this->isShopOwner($shop);

        $request->validate([
            'reward_name' => ['required'],
            'reward_img' => ['required'],
            'condition' => ['required'],
            'template_id' => ['required'],
            'point' => ['required'],
            'exp_date' => ['required'],
            'exp_time' => ['required'],
        ]);

        if($request->input('reward_img') !== $promotion->reward_img) {
            //upload image here
        }

        $promotion->reward_name = $request->input('reward_name');
        $promotion->condition = $request->input('condition');
        $promotion->template_id = $request->input('template_id');
        $promotion->point = $request->input('point');
        $promotion->exp_date = $request->input('exp_date').' '.$request->input('exp_time');
        $promotion->save();
        return redirect("/shops/{$shop->id}/promotion/{$promotion->id}");
    }

    public function destroyPromotion(Shop $shop, $promotion) {
        $this->isShopOwner($shop);

        $promotion->delete();
        return redirect("/shops/{$shop->id}");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
