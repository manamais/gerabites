@extends('layouts.restrito')
@section('content')



<div class='container-fluid'>
    <div class='row'>
        <div class='col-lg-12'>
            <div class='content-box'>
                <div class='head head-with-btns clearfix'>
                    <h5 class='content-title text-color pull-left'>Total sales statistics</h5>
                    <div class='functions-btns pull-right'>
                        <button type='button' class='btn btn-info'>
                            Week
                        </button>
                        <button type='button' class='btn btn-warning'>
                            Month
                        </button>
                        <button type='button' class='btn btn-warning'>
                            Year
                        </button>
                    </div>
                </div>
                <div class='content'>
                    <div id='js-legend' class='chart-legend'></div>
                    <div class='chartjs-container full-page-chart'>
                        <canvas id='chart-line'></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-3 col-md-6'>
            <div class='content-box warning-bg white'>
                <div class='head clearfix'>
                    <h5 class='content-title pull-left'>Orders</h5>
                    <div class='functions-btns pull-right'>
                        <a class='refresh-btn' href='#'><i class='zmdi zmdi-refresh'></i></a>
                        <a class='fullscreen-btn' href='#'><i class='zmdi zmdi-fullscreen'></i></a>
                        <a class='close-btn' href='#'><i class='zmdi zmdi-close'></i></a>
                    </div>
                </div>
                <div class='content'>
                    <div id='line-chart-3' class='flot-chart'></div>
                    <p class='text-uppercase zero-m'>Total orders</p>
                    <p class='zero-m f-30'>45,245,659</p>
                </div>
            </div>
        </div>
        <div class='col-lg-3 col-md-6'>
            <div class='content-box'>
                <div class='head clearfix'>
                    <h5 class='content-title text-color pull-left'>Implementation of a plan</h5>
                    <div class='functions-btns pull-right'>
                        <a class='refresh-btn text-color' href='#'><i class='zmdi zmdi-refresh'></i></a>
                        <a class='fullscreen-btn text-color' href='#'><i class='zmdi zmdi-fullscreen'></i></a>
                        <a class='close-btn text-color' href='#'><i class='zmdi zmdi-close'></i></a>
                    </div>
                </div>
                <div class='p-l-20'>
                    <button type='button' class='btn btn-info m-b-5'>
                        Week
                    </button>
                    <button type='button' class='btn btn-warning m-b-5'>
                        Month
                    </button>
                </div>
                <div class='content'>
                    <div class='easychart text-right' data-percent='55'></div>
                    <div class='p-absolute b-20 l-20'>
                        <p class='text-uppercase zero-m'>Profit</p>
                        <p class='zero-m danger-color f-30'>254,395</p>
                    </div>
                </div>
                <!-- Used for demo purposes. Remove if it is needed-->
                <div class='visible-lg visible-md' style='height: 6px;'></div>
            </div>
        </div>
        <div class='col-lg-3 col-md-6'>
            <div class='content-box success-bg white'>
                <div class='head clearfix'>
                    <h5 class='content-title pull-left'>Visitors</h5>
                    <div class='functions-btns pull-right'>
                        <a class='refresh-btn' href='#'><i class='zmdi zmdi-refresh'></i></a>
                        <a class='fullscreen-btn' href='#'><i class='zmdi zmdi-fullscreen'></i></a>
                        <a class='close-btn' href='#'><i class='zmdi zmdi-close'></i></a>
                    </div>
                </div>
                <div class='content'>
                    <div id='line-chart-4' class='flot-chart'></div>
                    <p class='text-uppercase zero-m'>Total visitors</p>
                    <p class='zero-m f-30'>15,654,700</p>
                </div>
            </div>
        </div>
        <div class='col-lg-3 col-md-6'>
            <div class='content-box info-bg white'>
                <div class='head clearfix'>
                    <h5 class='content-title pull-left'>Returns</h5>
                    <div class='functions-btns pull-right'>
                        <a class='refresh-btn' href='#'><i class='zmdi zmdi-refresh'></i></a>
                        <a class='fullscreen-btn' href='#'><i class='zmdi zmdi-fullscreen'></i></a>
                        <a class='close-btn' href='#'><i class='zmdi zmdi-close'></i></a>
                    </div>
                </div>
                <div class='content'>
                    <div id='line-chart-2' class='flot-chart'></div>
                    <p class='text-uppercase zero-m'>Total returns</p>
                    <p class='zero-m f-30'>573,935</p>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-6'>
            <div class='data-info'>
                <table id='table2' class='display widget datatable'>
                    <thead>
                        <tr>
                            <th>Currency</th>
                            <th>Buy</th>
                            <th>Sell</th>
                            <th>Change</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>UAH</td>
                            <td>22.35</td>
                            <td>23.30</td>
                            <td><span class='zmdi zmdi-long-arrow-down danger-color f-s-18'></span> -0.26%</td>
                        </tr>
                        <tr>
                            <td>EUR</td>
                            <td>1.13</td>
                            <td>1.16</td>
                            <td><span class='zmdi zmdi-long-arrow-up success-color f-s-18'></span> +0.38%</td>
                        </tr>
                        <tr>
                            <td>AUD</td>
                            <td>22.35</td>
                            <td>23.30</td>
                            <td><span class='zmdi zmdi-long-arrow-up success-color f-s-18'></span> +0.38%</td>
                        </tr>
                        <tr>
                            <td>JPY</td>
                            <td>32.30</td>
                            <td>33.90</td>
                            <td><span class='zmdi zmdi-long-arrow-up success-color f-s-18'></span> +0.38%</td>
                        </tr>
                        <tr>
                            <td>JPY</td>
                            <td>32.30</td>
                            <td>33.90</td>
                            <td><span class='zmdi zmdi-long-arrow-down danger-color f-s-18'></span> -0.26%</td>
                        </tr>
                        <tr>
                            <td>CAD</td>
                            <td>0.86</td>
                            <td>0.91</td>
                            <td><span class='zmdi zmdi-long-arrow-up success-color f-s-18'></span> +0.38%</td>
                        </tr>
                        <tr>
                            <td>UAH</td>
                            <td>22.35</td>
                            <td>23.30</td>
                            <td><span class='zmdi zmdi-long-arrow-up success-color f-s-18'></span> +0.38%</td>
                        </tr>
                        <tr>
                            <td>EUR</td>
                            <td>1.13</td>
                            <td>1.16</td>
                            <td><span class='zmdi zmdi-long-arrow-up success-color f-s-18'></span> +0.38%</td>
                        </tr>
                        <tr>
                            <td>AUD</td>
                            <td>22.35</td>
                            <td>23.30</td>
                            <td><span class='zmdi zmdi-long-arrow-down danger-color f-s-18'></span> -0.26%</td>
                        </tr>
                        <tr>
                            <td>JPY</td>
                            <td>32.30</td>
                            <td>33.90</td>
                            <td><span class='zmdi zmdi-long-arrow-down danger-color f-s-18'></span> -0.26%</td>
                        </tr>
                        <tr>
                            <td>CAD</td>
                            <td>0.86</td>
                            <td>0.91</td>
                            <td><span class='zmdi zmdi-long-arrow-up success-color f-s-18'></span> +0.38%</td>
                        </tr>
                        <tr>
                            <td>JPY</td>
                            <td>32.30</td>
                            <td>33.90</td>
                            <td><span class='zmdi zmdi-long-arrow-down danger-color f-s-18'></span> -0.26%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='content-box o-hidden'>
                <div class='head clearfix'>
                    <h5 class='content-title text-color pull-left'>To do list</h5>
                    <div class='functions-btns pull-right'>
                        <a class='refresh-btn text-color' href='#'><i class='zmdi zmdi-refresh'></i></a>
                        <a class='fullscreen-btn text-color' href='#'><i class='zmdi zmdi-fullscreen'></i></a>
                        <a class='close-btn text-color' href='#'><i class='zmdi zmdi-close'></i></a>
                    </div>
                </div>
                <div class='panel zero-m'>
                    <div class='panel-body todo'>
                        <ul class='list-group zero-m'>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Searches
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Advertising
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Links
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Advertising
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Links
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Social media
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Searches
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Links
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Links
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                            <li class='list-group-item'>
                                <div class='checkbox checkbox-alt checkbox-primary'>
                                    <label>
                                        <input type='checkbox'>
                                        <i></i>
                                        Advertising
                                    </label>
                                </div>
                                <a class='trash pull-right'><span class='zmdi zmdi-close primary-color f-s-16'></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Used for demo purposes. Remove if it is needed-->
                <div class='visible-lg visible-md' style='height: 22px;'></div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-3 col-md-6'>
            <div class='content-box p-20 twitter white f-s-16'>
                <img src='assets/restrito/img/avatar.png' class='pull-left m-r-10' alt='avatar'>
                <span class='text-uppercase'>John Massey</span>  <br>
                <span class='half-opacity'>@john</span>
                <span class='zmdi zmdi-twitter p-absolute t-20 r-20 f-s-20'></span>
                <p class='m-t-20'>Yet she income effect edward. Entire desire way design few. Mrs sentiments led solicitude estimating effect edward. Spite mirth money six above get going great own effect edward.</p>
                <div class='socials text-right f-s-20'>
                    <span class='share half-opacity'><i class='zmdi zmdi-share'></i></span>
                    <span class='like half-opacity m-l-10'><i class='zmdi zmdi-thumb-up'></i></span>
                </div>
            </div>
        </div>
        <div class='col-lg-3 col-md-6'>
            <div class='content-box p-20 facebook white f-s-16'>
                <img src='assets/restrito/img/avatar2.png' class='pull-left m-r-10' alt='avatar'>
                <span class='text-uppercase'>Maria Thompson</span>  <br>
                <span class='half-opacity'>@mark</span>
                <span class='zmdi zmdi-facebook p-absolute t-20 r-20 f-s-20'></span>
                <p class='m-t-20'>Yet she income effect edward. Entire desire way design few. Mrs sentiments led solicitude estimating effect edward. Spite mirth money six above get going great own effect edward.</p>
                <div class='socials text-right f-s-20'>
                    <span class='share half-opacity'><i class='zmdi zmdi-share'></i></span>
                    <span class='like half-opacity m-l-10'><i class='zmdi zmdi-thumb-up'></i></span>
                </div>
            </div>
        </div>
        <div class='col-lg-3 col-md-6'>
            <div class='content-box p-20 gplus white f-s-16'>
                <img src='assets/restrito/img/avatar3.png' class='pull-left m-r-10' alt='avatar'>
                <span class='text-uppercase'>Nelly Peterson</span>  <br>
                <span class='half-opacity'>@alex</span>
                <span class='zmdi zmdi-google-plus p-absolute t-20 r-20 f-s-20'></span>
                <p class='m-t-20'>Yet she income effect edward. Entire desire way design few. Mrs sentiments led solicitude estimating effect edward. Spite mirth money six above get going great own effect edward.</p>
                <div class='socials text-right f-s-20'>
                    <span class='share half-opacity'><i class='zmdi zmdi-share'></i></span>
                    <span class='like half-opacity m-l-10'><i class='zmdi zmdi-thumb-up'></i></span>
                </div>
            </div>
        </div>
        <div class='col-lg-3 col-md-6'>
            <div class='content-box p-20 soundcloud white f-s-16'>
                <img src='assets/restrito/img/avatar4.png' class='pull-left m-r-10' alt='avatar'>
                <span class='text-uppercase'>Jack Daniels</span>  <br>
                <span class='half-opacity'>@jack</span>
                <span class='zmdi zmdi-soundcloud p-absolute t-20 r-20 f-s-20'></span>
                <p class='m-t-20'>Yet she income effect edward. Entire desire way design few. Mrs sentiments led solicitude estimating effect edward. Spite mirth money six above get going great own effect edward.</p>
                <div class='socials text-right f-s-20'>
                    <span class='share half-opacity'><i class='zmdi zmdi-share'></i></span>
                    <span class='like half-opacity m-l-10'><i class='zmdi zmdi-thumb-up'></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection