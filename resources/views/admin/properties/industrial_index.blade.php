@extends('admin.layouts.app')
@section('content')
    @php
        $is_dynamic_form = true;
    @endphp
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">

                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="mb-3">Industrial Properties</h5>
                            <div class="row">
                                @include('admin.properties.change_menu')
                                <div class="col-md-8">
                                    <a
                                        class="btn custom-icon-theme-button"
                                        href="{{ route('admin.property.add') }}"
                                        title="Add Property"
                                    >
                                        <i class="fa fa-plus"></i>
                                    </a>

                                    <button
                                        class="btn ms-3 custom-icon-theme-button"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#filtermodal"
                                        title="Filter"
                                    ><i class="fa fa-filter"></i></button>

                                    <button
                                        class="btn ms-3 custom-icon-theme-button"
                                        type="button"
                                        title="Clear Filter"
                                        id="resetfilter"
                                        style="display: none;"
                                    ><i class="fa fa-refresh"></i></button>

                                    <button
                                        class="btn ms-3 custom-icon-theme-button"
                                        onclick="importProperties()"
                                        type="button"
                                        title="Import"
                                    ><i class="fa fa-upload"></i></button>

                                    <button class="btn ms-3 custom-icon-theme-button" onclick="exportProperties()"
                                        type="button" title="Export"><i class="fa fa-download"></i></button>

                                    <button class="btn share_table_row ms-3"
                                        style="border-radius: 5px;display: none;background-color:#25d366;color:white;"
                                        onclick="shareTableRow()" type="button" title="Share"><i
                                            class="fa fa-whatsapp"></i></button>
                                        
                                    <button
                                        class="btn text-white delete_table_row ms-3"
                                        style="border-radius: 5px;display: none;background-color:red"
                                        onclick="deleteTableRow()"
                                        type="button"
                                        title="Delete"
                                    ><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="propertyTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                    <input class="form-check-input" id="select_all_checkbox"
                                                        name="selectrows" type="checkbox">
                                                    <label class="form-check-label" for="select_all_checkbox"></label>
                                                </div>
                                            </th>
                                            <th>Project</th>
                                            <th>Property For</th>
                                            <th>Units</th>
                                            <th>Price</th>
                                            <th>Remarks</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="industrialpropertyModal" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Industrial Property</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        @include('admin.properties.add_industrial_property')
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="filtermodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation " method="post" id="filter_form" novalidate="">
                            @csrf
                            <div>
                                <div class="row">
                                    {{-- <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_building_id">
                                            <option value=""> Project</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    
                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_property_for">
                                            <option value="">Property For</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sell">Sell</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_property_type">
                                            <option value="">Property Type</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_construction_type' && in_array($props['id'], $prop_type))
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                    {{-- @dd($props['name']); --}}
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    {{-- Villa --}}
                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_specific_type">
                                            <option value="">Category</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_specific_type' && in_array($props['parent_id'], $prop_type))
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}</option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_configuration">
                                            <option value="">Sub Category</option>
                                        </select>
                                    </div>
                                    {{-- <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_zone">
                                            <option value="">Zone</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_zone')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div> --}}

                                    {{-- <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_property_status">
                                            <option value=""> Status</option>
                                            <option value="Available">Available</option>
                                            <option value="SoldOut">Sold Out</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-md-4 m-b-4 mb-3">
                                        <label class="select2_label" for="Select Project"> Project</label>
                                        <select class="form-select" id="filter_building_id" multiple>
                                            @foreach ($projects as $building)
                                                <option value="{{ $building->id }}">{{ $building->project_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 m-b-4 mb-3">
                                        {{-- <label class="select2_label" for="Select Project"> Source Of Property</label> --}}
                                        <select class="form-select" id="filter_source_of_property">
                                            <option value="">Source Of Property</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_source')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 m-b-4 mb-3">
                                        <select class="form-select" id="filter_area_id">
                                            <option value=""> Area</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <hr class="color-hr">

                                    {{-- <div class="form-group col-md-4 m-b-20">
                                        <label for="From Area">From Area</label>
                                        <input class="form-control" name="filter_from_area" id="filter_from_area"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 m-b-20">
                                        <label for="To Area">To Area</label>
                                        <input class="form-control" name="filter_to_area" id="filter_to_area"
                                            type="text" autocomplete="off">
                                    </div> --}}
                                    {{-- <div class="form-group col-md-2 m-b-4 mb-3">
                                        <select class="form-select form_measurement measure_select"
                                            id="filter_measurement">
                                            <option value="">Measurement</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_measurement_type')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div> --}}
                                    {{-- <div class="form-group col-md-4 m-b-20">
                                        <label for="From Price">From Price</label>
                                        <input class="form-control indian_currency_amount" name="filter_from_price"
                                            id="filter_from_price" type="text" autocomplete="off">
                                    </div> --}}
                                    {{-- <div class="form-group col-md-4 m-b-20">
                                        <label for="To Price">To Price</label>
                                        <input class="form-control indian_currency_amount" name="filter_to_price"
                                            id="filter_to_price" type="text" autocomplete="off">
                                    </div> --}}



                                </div>
                            </div>
                            <button class="btn btn-secondary" id="filtersearch">Filter</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="importmodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Property</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation " method="post" id="import_form" novalidate="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-5 m-b-20">
                                    <label for="Choose File">File</label>
                                    <input class="form-control" type="file" accept=".xlsx" name="import_file"
                                        id="import_file">
                                </div>
                                <br>
                                <div class="form-group col-md-5 m-b-10">
                                    <a href="{{ route('admin.importindustrialpropertyTemplate') }}">Download Sample
                                        file</a>
                                </div>

                                <br>
                            </div>
                            <button class="btn btn-secondary" id="importFile">Save</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="whatsappModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Share On whatsapp</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-5 m-b-4 mb-3">
                                <select class="form-select mt-1" id="conatct_id"
                                    style="border: 1px solid black;border-radius:5px;">
                                    <option value=""> Contact</option>
                                    @forelse ($conatcts_numbers as $number)
                                        <option value="{{ $number['number'] }}">{{ $number['name'] }}
                                            ({{ $number['number'] }})
                                        </option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-b-4 mb-3">
                                <select class="form-control" id="CountryCode" name="CountryCode"
                                    style="border: 1px solid black;border-radius:5px;">
                                    <option value=""></option>
                                    <option value="93">93</option>
                                    <option value="355">355</option>
                                    <option value="213">213</option>
                                    <option value="1-684">1-684</option>
                                    <option value="376">376</option>
                                    <option value="244">244</option>
                                    <option value="1-264">1-264</option>
                                    <option value="672">672</option>
                                    <option value="1-268">1-268</option>
                                    <option value="54">54</option>
                                    <option value="374">374</option>
                                    <option value="297">297</option>
                                    <option value="61">61</option>
                                    <option value="43">43</option>
                                    <option value="994">994</option>
                                    <option value="1-242">1-242</option>
                                    <option value="973">973</option>
                                    <option value="880">880</option>
                                    <option value="1-246">1-246</option>
                                    <option value="375">375</option>
                                    <option value="32">32</option>
                                    <option value="501">501</option>
                                    <option value="229">229</option>
                                    <option value="1-441">1-441</option>
                                    <option value="975">975</option>
                                    <option value="591">591</option>
                                    <option value="387">387</option>
                                    <option value="267">267</option>
                                    <option value="55">55</option>
                                    <option value="246">246</option>
                                    <option value="1-284">1-284</option>
                                    <option value="673">673</option>
                                    <option value="359">359</option>
                                    <option value="226">226</option>
                                    <option value="257">257</option>
                                    <option value="855">855</option>
                                    <option value="237">237</option>
                                    <option value="1">1</option>
                                    <option value="238">238</option>
                                    <option value="1-345">1-345</option>
                                    <option value="236">236</option>
                                    <option value="235">235</option>
                                    <option value="56">56</option>
                                    <option value="86">86</option>
                                    <option value="61">61</option>
                                    <option value="61">61</option>
                                    <option value="57">57</option>
                                    <option value="269">269</option>
                                    <option value="682">682</option>
                                    <option value="506">506</option>
                                    <option value="385">385</option>
                                    <option value="53">53</option>
                                    <option value="599">599</option>
                                    <option value="357">357</option>
                                    <option value="420">420</option>
                                    <option value="243">243</option>
                                    <option value="45">45</option>
                                    <option value="253">253</option>
                                    <option value="1-767">1-767</option>
                                    <option value="670">670</option>
                                    <option value="593">593</option>
                                    <option value="20">20</option>
                                    <option value="503">503</option>
                                    <option value="240">240</option>
                                    <option value="291">291</option>
                                    <option value="372">372</option>
                                    <option value="251">251</option>
                                    <option value="500">500</option>
                                    <option value="298">298</option>
                                    <option value="679">679</option>
                                    <option value="358">358</option>
                                    <option value="33">33</option>
                                    <option value="689">689</option>
                                    <option value="241">241</option>
                                    <option value="220">220</option>
                                    <option value="995">995</option>
                                    <option value="49">49</option>
                                    <option value="233">233</option>
                                    <option value="350">350</option>
                                    <option value="30">30</option>
                                    <option value="299">299</option>
                                    <option value="1-473">1-473</option>
                                    <option value="1-671">1-671</option>
                                    <option value="502">502</option>
                                    <option value="44-1481">44-1481</option>
                                    <option value="224">224</option>
                                    <option value="245">245</option>
                                    <option value="592">592</option>
                                    <option value="509">509</option>
                                    <option value="504">504</option>
                                    <option value="852">852</option>
                                    <option value="36">36</option>
                                    <option value="354">354</option>
                                    <option selected="selected" value="91">91</option>
                                    <option value="62">62</option>
                                    <option value="98">98</option>
                                    <option value="964">964</option>
                                    <option value="353">353</option>
                                    <option value="44-1624">44-1624</option>
                                    <option value="972">972</option>
                                    <option value="39">39</option>
                                    <option value="225">225</option>
                                    <option value="1-876">1-876</option>
                                    <option value="81">81</option>
                                    <option value="44-1534">44-1534</option>
                                    <option value="962">962</option>
                                    <option value="7">7</option>
                                    <option value="254">254</option>
                                    <option value="686">686</option>
                                    <option value="383">383</option>
                                    <option value="965">965</option>
                                    <option value="996">996</option>
                                    <option value="856">856</option>
                                    <option value="371">371</option>
                                    <option value="961">961</option>
                                    <option value="266">266</option>
                                    <option value="231">231</option>
                                    <option value="218">218</option>
                                    <option value="423">423</option>
                                    <option value="370">370</option>
                                    <option value="352">352</option>
                                    <option value="853">853</option>
                                    <option value="389">389</option>
                                    <option value="261">261</option>
                                    <option value="265">265</option>
                                    <option value="60">60</option>
                                    <option value="960">960</option>
                                    <option value="223">223</option>
                                    <option value="356">356</option>
                                    <option value="692">692</option>
                                    <option value="222">222</option>
                                    <option value="230">230</option>
                                    <option value="262">262</option>
                                    <option value="52">52</option>
                                    <option value="691">691</option>
                                    <option value="373">373</option>
                                    <option value="377">377</option>
                                    <option value="976">976</option>
                                    <option value="382">382</option>
                                    <option value="1-664">1-664</option>
                                    <option value="212">212</option>
                                    <option value="258">258</option>
                                    <option value="95">95</option>
                                    <option value="264">264</option>
                                    <option value="674">674</option>
                                    <option value="977">977</option>
                                    <option value="31">31</option>
                                    <option value="599">599</option>
                                    <option value="687">687</option>
                                    <option value="64">64</option>
                                    <option value="505">505</option>
                                    <option value="227">227</option>
                                    <option value="234">234</option>
                                    <option value="683">683</option>
                                    <option value="850">850</option>
                                    <option value="1-670">1-670</option>
                                    <option value="47">47</option>
                                    <option value="968">968</option>
                                    <option value="92">92</option>
                                    <option value="680">680</option>
                                    <option value="970">970</option>
                                    <option value="507">507</option>
                                    <option value="675">675</option>
                                    <option value="595">595</option>
                                    <option value="51">51</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="48">48</option>
                                    <option value="351">351</option>
                                    <option value="974">974</option>
                                    <option value="242">242</option>
                                    <option value="262">262</option>
                                    <option value="40">40</option>
                                    <option value="7">7</option>
                                    <option value="250">250</option>
                                    <option value="590">590</option>
                                    <option value="290">290</option>
                                    <option value="1-869">1-869</option>
                                    <option value="1-758">1-758</option>
                                    <option value="590">590</option>
                                    <option value="508">508</option>
                                    <option value="1-784">1-784</option>
                                    <option value="685">685</option>
                                    <option value="378">378</option>
                                    <option value="239">239</option>
                                    <option value="966">966</option>
                                    <option value="221">221</option>
                                    <option value="381">381</option>
                                    <option value="248">248</option>
                                    <option value="232">232</option>
                                    <option value="65">65</option>
                                    <option value="1-721">1-721</option>
                                    <option value="421">421</option>
                                    <option value="386">386</option>
                                    <option value="677">677</option>
                                    <option value="252">252</option>
                                    <option value="27">27</option>
                                    <option value="82">82</option>
                                    <option value="211">211</option>
                                    <option value="34">34</option>
                                    <option value="94">94</option>
                                    <option value="249">249</option>
                                    <option value="597">597</option>
                                    <option value="47">47</option>
                                    <option value="268">268</option>
                                    <option value="46">46</option>
                                    <option value="41">41</option>
                                    <option value="963">963</option>
                                    <option value="886">886</option>
                                    <option value="992">992</option>
                                    <option value="255">255</option>
                                    <option value="66">66</option>
                                    <option value="228">228</option>
                                    <option value="690">690</option>
                                    <option value="676">676</option>
                                    <option value="1-868">1-868</option>
                                    <option value="216">216</option>
                                    <option value="90">90</option>
                                    <option value="993">993</option>
                                    <option value="1-649">1-649</option>
                                    <option value="688">688</option>
                                    <option value="1-340">1-340</option>
                                    <option value="256">256</option>
                                    <option value="380">380</option>
                                    <option value="971">971</option>
                                    <option value="44">44</option>
                                    <option value="1">1</option>
                                    <option value="598">598</option>
                                    <option value="998">998</option>
                                    <option value="678">678</option>
                                    <option value="379">379</option>
                                    <option value="58">58</option>
                                    <option value="84">84</option>
                                    <option value="681">681</option>
                                    <option value="212">212</option>
                                    <option value="967">967</option>
                                    <option value="260">260</option>
                                    <option value="263">263</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 m-b-4 mb-3">
                                <div class="fname">
                                    <input type="text" placeholder="Number" name="whatsapp_number"
                                        class="form-control" pattern="[1-9]{1}[0-9]{9}" id="whatsapp_number">
                                </div>
                            </div>
                            <input type="hidden" name="shar_string" id="shar_string">
                        </div>
                        <div class="text-center mt-3">
                            <button class="btn custom-theme-button" type="button" id="shareonwhatsapp">Share</button>
                            <button class="btn btn-primary ms-3" style="border-radius: 5px;" type="button"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @php
		$city_encoded = json_encode($cities);
		$state_encoded = json_encode($states);
		@endphp --}}
    @endsection
    @push('scripts')
        @include('admin.properties.industrial_property_javascript', [
            'cities' => $cities,
            'states' => $states,
        ])
        <script>
            $(document).on('change', '#filter_property_type', function(e) {
                var parent_value = $(this).val();
                console.log("type changed", parent_value);
                $("#filter_specific_type option , #filter_configuration option").each(function() {
                    if (parent_value !== '') {
                        if ($(this).attr('value') != '') {
                            if ($(this).attr('data-parent_id') == '' || $(this).attr('data-parent_id') !=
                                parent_value) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        }
                    } else {
                        $(this).show();
                    }
                });
            });

            function shareTableRow() {
                var msg = '';
                $(".table_checkbox").each(function(index) {
                    if ($(this).prop('checked')) {
                        var strp = $($(this).closest('tr')).find('i').each(function(i, e) {
                            if ($(this).attr('data-share_string') != undefined) {
                                msg = msg + '%0a --------------------- %0a' + ($(this).attr(
                                    'data-share_string')).replace(
                                    'https://api.whatsapp.com/send?phone=the_phone_number_to_send&text=', ''
                                )
                            }
                        });
                    }
                })
                console.log("msg ::", msg);
                $('#shar_string').val('https://api.whatsapp.com/send?phone=the_phone_number_to_send&text=' + msg)
                $('#whatsappModal').modal('show');
            }
            $(document).on('click', '#shareonwhatsapp', function(e) {
                    var url = $('#shar_string').val()
                    console.log("ulr1 ==>", url);
                    url = url.replace('the_phone_number_to_send', $('#CountryCode').val() + $(
                        '#whatsapp_number').val().toString())
                    console.log("ulr2 ==>", url);
                    window.open(url, '_blank').focus();
                })
                
            function openwamodel(params) {
                $('#shar_string').val($(params).attr('data-share_string'))
                $('#whatsappModal').modal('show');

            }

            // category to sub category on change filter
            $('#filter_specific_type').on('change', function() {
                let selectedCategory = this.options[this.selectedIndex].text.trim();
                let url = "{{ route('admin.getPropertyConfiguration') }}";

                try {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", `${url}?selectedCategory=${encodeURIComponent(selectedCategory)}`, true);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                var data = JSON.parse(xhr.responseText);
                                console.log("Subcat Filter data == ", data);

                                var subCategorySelect = document.getElementById('filter_configuration');
                                subCategorySelect.innerHTML = '<option value="">Sub Category</option>';

                                for (var key in data) {
                                    if (data.hasOwnProperty(key)) {
                                        var option = document.createElement('option');
                                        option.value = key;
                                        option.text = data[key];
                                        option.dataset.category = data[key];
                                        subCategorySelect.appendChild(option);
                                    }
                                }
                            } else {
                                console.error("An error occurred:", xhr.statusText);
                            }
                        }
                    };

                    xhr.send();
                } catch (error) {
                    console.error("An error occurred:", error);
                }
            });

            var shouldchangecity = 1;

            $(document).ready(function() {
                $('#propertyTable').DataTable({
                    processing: true,
                    serverSide: true,
                    @if (!Auth::user()->can('search-industrial-property'))
                        searching: false,
                    @endif
                    ordering: true,
                    ajax: {
                        url: "{{ route('admin.industrial.properties') }}",
                        data: function(d) {
                            d.filter_building_id = $('#filter_building_id').val()
                            d.filter_property_for = $('#filter_property_for').val()
                            d.filter_specific_type = $('#filter_specific_type').val()
                            d.filter_configuration = $('#filter_configuration').val()
                            // d.filter_zone = $('#filter_zone').val()
                            // d.filter_property_status = $('#filter_property_status').val()
                            d.filter_source_of_property = $('#filter_source_of_property').val()
                            d.filter_area_id = $('#filter_area_id').val()
                            // d.filter_from_area = $('#filter_from_area').val()
                            // d.filter_to_area = $('#filter_to_area').val()
                            // d.filter_measurement = $('#filter_measurement').val()
                            d.filter_from_price = $('#filter_from_price').val()
                            d.filter_to_price = $('#filter_to_price').val()
                        },
                    },
                    columns: [{
                            data: 'select_checkbox',
                            name: 'select_checkbox',
                            orderable: false
                        },
                        {
                            data: 'project_id',
                            name: 'project_id',
                        },
                        {
                            data: 'property_for',
                            name: 'property_for'
                        },
                        {
                            data: 'unit_details',
                            name: 'unit_details'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },
                        // {
                        //     data: 'contact_details',
                        //     name: 'contact_details'
                        // },
                        {
                            data: 'remarks',
                            name: 'remarks'
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false
                        },
                    ],
                    columnDefs: [{
                            "width": "2%",
                            "targets": 0
                        },
                        {
                            "width": "20%",
                            "targets": 1
                        },
                        {
                            "width": "17%",
                            "targets": 2
                        },
                        {
                            "width": "10%",
                            "targets": 3
                        },
                        {
                            "width": "12%",
                            "targets": 4
                        },
                        {
                            "width": "15%",
                            "targets": 5
                        },
                        {
                            "width": "18%",
                            "targets": 6
                        },
                    ],
                    "drawCallback": function(settings, json) {
                        setTimeout(() => {
                            $('.color-code-popover').popover({
                                html: true,
                            });
                        }, 500);
                        var popoverTriggerList = [].slice.call(document.querySelectorAll(
                            '[data-bs-toggle="popover"]'))
                        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                            return new bootstrap.Popover(popoverTriggerEl)
                        });
                    }
                });
            });


            $(document).on('click', '#filtersearch', function(e) {
                e.preventDefault();
                search_enq = '';
                $('#resetfilter').show();
                $('#propertyTable').DataTable().draw();
                $('#filtermodal').modal('hide');
            });

            $(document).on('click', '#resetfilter', function(e) {
                e.preventDefault();
                $(this).hide();
                $('#filter_form').trigger("reset");
                $('#propertyTable').DataTable().draw();
                $('#filtermodal').modal('hide');
                triggerResetFilter()
            });

            function importProperties(params) {
                $('#importmodal').modal('show');
            }

            function exportProperties(params) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.export.property') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        window.open(data)
                    }
                });
            }

            $(document).on('click', '#importFile', function(e) {
                e.preventDefault();
                var formData = new FormData();
                var files = $('#import_file')[0].files[0];
                if (files == '') {
                    return;
                }
                formData.append('csv_file', files);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    type: "POST",
                    processData: false,
                    contentType: false,
                    url: "{{ route('admin.importIndustrialproperty') }}",
                    data: formData,
                    success: function(data) {
                        $('#propertyTable').DataTable().draw();
                        $('#importmodal').modal('hide');
                        $('#import_form')[0].reset();
                    }
                });
            })

            // $(document).on('change', '#filter_property_type', function(e) {
            //     var parent_value = $(this).val();
            //     $("#filter_specific_type option , #filter_configuration option").each(function() {
            //         if (parent_value !== '') {
            //             if ($(this).attr('value') != '') {
            //                 if ($(this).attr('data-parent_id') == '' || $(this).attr('data-parent_id') !=
            //                     parent_value) {
            //                     $(this).hide();
            //                 } else {
            //                     $(this).show();
            //                 }
            //             }
            //         } else {
            //             $(this).show();
            //         }
            //     });
            // });



            $(document).on('click', '.showNumberNow', function(e) {
                numb = $(this).attr('data-val');
                $(this).replaceWith('<a href="tel:' + numb + '">' + numb + '</a>');
            })

            function getProperty(data) {
                shouldchangecity = 0
                $('#modal_form').trigger("reset");
                var id = $(data).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.industrial.getProperty') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        $('#this_data_id').val(data.id);
                        $('#property_for').val(data.property_for).trigger('change');;
                        $('#building_id').val(data.building_id).trigger('change');;
                        $('#address').val(data.address);
                        $('#area_id').val(data.area_id).trigger('change');
                        $('#city_id').val(data.city_id).trigger('change');
                        $('#state_id').val(data.state_id).trigger('change');
                        $('#specific_type').val(data.specific_type).trigger('change');;
                        $('#configuration').val(data.configuration).trigger('change');;
                        $('#zone').val(data.zone).trigger('change');;
                        $('#property_wing').val(data.property_wing);
                        $('#property_unit_no').val(data.property_unit_no);
                        $('#property_status').val(data.property_status).trigger('change');;
                        $('#plot_area').val(data.plot_area);
                        $('#plot_measurement').val(data.plot_measurement).trigger('change');;
                        $('#construction_area').val(data.construction_area);
                        $('#construction_measurement').val(data.construction_measurement).trigger('change');;
                        $('#hot_property').prop('checked', Number(data.hot_property));
                        $('#is_pre_leased').prop('checked', Number(data.pre_leased));
                        $('#property_description').val(data.Property_description);
                        $('#commision').val(data.commission);
                        $('#source_of_property').val(data.source_of_property).trigger('change');;
                        $('#price').val(data.price);
                        $('#price_remarks').val(data.price_remarks);
                        $('#property_remarks').val(data.remarks);
                        $('#gpcb').prop('checked', Number(data.gpcb));
                        $('#gpcb_remarks').val(data.gpcb_remarks);
                        $('#ec_noc').prop('checked', Number(data.ec_noc));
                        $('#ec_noc_remark').val(data.ec_noc_remarks);
                        $('#bail').prop('checked', Number(data.bail));
                        $('#bail_remark').val(data.bail_remarks);
                        $('#gujrat_gas').prop('checked', Number(data.gujrat_gas));
                        $('#gujrat_gas_remark').val(data.gujrat_gas_remarks);
                        $('#discharge').prop('checked', Number(data.discharge));
                        $('#discharge_remark').val(data.discharge_remarks);
                        $('#power').prop('checked', Number(data.power));
                        $('#power_remark').val(data.power_remarks);
                        $('#water').prop('checked', Number(data.water));
                        $('#water_remark').val(data.water_remarks);
                        $('#machinery').prop('checked', Number(data.machinery));
                        $('#machinery_remark').val(data.machinery_remarks);
                        $('#etl_necpt').prop('checked', Number(data.etl_necpt));
                        $('#etl_necpt_remark').val(data.etl_necpt_remarks);
                        shouldchangecity = 1
                        $('#all_owner_contacts').html('')
                        if (data.owner_details != '') {
                            details = JSON.parse(data.owner_details);
                            for (let i = 0; i < details.length; i++) {
                                id = makeid(10);
                                $('#all_owner_contacts').append(generate_contact_detail2(id))
                                floatingField();
                                $("[data-contact_id=" + id + "] select[name=owner_status]").select2()
                                $("[data-contact_id=" + id + "] input[name=owner_name]").val(details[i][0]);
                                $("[data-contact_id=" + id + "] input[name=owner_contact_no]").val(details[i][1]);
                                $("[data-contact_id=" + id + "] select[name=owner_status]").val(details[i][2])
                                    .trigger('change');
                            }
                        }
                        $('#industrialpropertyModal').modal('show');
                        triggerChangeinput()
                    }
                });
            }

            function makeid(length) {
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            }

            $(document).on("click", ".open_modal_with_this", function(e) {
                $('#all_owner_contacts').html('')
                $('#all_owner_contacts').append(generate_contact_detail2(makeid(10)));
                $("#all_owner_contacts select").each(function(index) {
                    $(this).select2();
                })
                floatingField();
            })

            $(document).on('change', '#select_all_checkbox', function(e) {
                if ($(this).prop('checked')) {
                    $('.delete_table_row').show();

                    $(".table_checkbox").each(function(index) {
                        $(this).prop('checked', true)
                    })
                } else {
                    $('.delete_table_row').hide();
                    $(".table_checkbox").each(function(index) {
                        $(this).prop('checked', false)
                    })
                }
            })

            $(document).on('change', '.table_checkbox', function(e) {
                var rowss = [];
                $(".table_checkbox").each(function(index) {
                    if ($(this).prop('checked')) {
                        rowss.push($(this).attr('data-id'))
                    }
                })
                if (rowss.length > 0) {
                    $('.delete_table_row').show();
                } else {
                    $('.delete_table_row').hide();
                }
            })

            function deleteTableRow(params) {
                var rowss = [];
                $(".table_checkbox").each(function(index) {
                    if ($(this).prop('checked')) {
                        rowss.push($(this).attr('data-id'))
                    }
                })
                if (rowss.length > 0) {
                    Swal.fire({
                        title: "Are you sure?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                    }).then(function(isConfirm) {
                        if (isConfirm.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('admin.deleteProperty') }}",
                                data: {
                                    allids: JSON.stringify(rowss),
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    $('.delete_table_row').hide();
                                    $('#propertyTable').DataTable().draw();
                                }
                            });
                        }
                    })
                }
            }


            function deleteProperty(data) {
                Swal.fire({
                    title: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then(function(isConfirm) {
                    if (isConfirm.isConfirmed) {
                        var id = $(data).attr('data-id');
                        $.ajax({
                            type: "POST",
                            url: "{{ route('admin.deleteProperty') }}",
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#propertyTable').DataTable().draw();
                            }
                        });
                    }
                })

            }

            function floatingField() {
                //changed by Subhash
                $("form input").each(function(index) {
                    if ($(this).attr('type') == 'text' || $(this).attr('type') == 'email') {
                        var inputhtml = $(this).clone()
                        var parentId = $(this).parent();
                        if (parentId.find('label').length > 0) {
                            $(this).remove();
                            var currenthtml = $(parentId).html()
                            $(parentId).html('<div class="fname">' + currenthtml + '<div class="fvalue">' + inputhtml[0]
                                .outerHTML + '</div>' + '</div>')
                        }
                    }
                })

                $("form select").each(function(index) {
                    var attrs = $(this).attr('multiple');
                    if (typeof attrs === 'undefined' || attrs === false) {
                        $(this).find('option:first').attr('selected', 'selected')
                        // $(this).find('option:first').attr('disabled', 'disabled')
                    }
                    $(this).select2();
                })
            }
        </script>
    @endpush
