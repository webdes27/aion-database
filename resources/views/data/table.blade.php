@extends('_layouts.master')

@section('content')
		<div class="row" style="border: 2px solid white;">
			<div class="col-md-12">
				@if(count($items) === 0)
					<center>Aucun résultat trouvé.</center>
				@else
				{{$type}} (affichage de {{count($items)}} objets)
				<table id="dataSource" class="table table-striped compact" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th style="width: 80px;">ID</th>
							<th style="width: 40px;">&nbsp;</th>
							<th>Nom</th>
							<th style="width: 40px;">Niveau</th>
							<th style="width: 40px;">Race</th>
						</tr>
					</thead>
					<tbody>
					@foreach($items as $item)<tr>
						<td class="strong">{{$item->id}}</td>
						<td class="strong"><img src="/theme/2.7/images/icons/{!! strtolower($item->icon_name)!!}.png" /></td>
						<td class="strong"><a href="{{Route('lang.item.id', ['lang' => $lang, 'type' => 'item', 'id' => $item->id])}}" onMouseover="getTip({{$item->id}})" onMouseout="hideDiv()"><span class="quality-{{$item->quality}}">@if($lang == 'fr'){{$item->desc_fr}}@elseif($lang == 'en'){{$item->desc_en}}@endif</span></a></td>
						<td class="strong">{{$item->level}}</td>
						<td class="strong">
							@if($item->race_permited == 'pc_light') <img src="{!! asset('theme/2.7/images/icons/light.png') !!}" /> 
							@elseif($item->race_permited == 'pc_dark') <img src="{!! asset('theme/2.7/images/icons/dark.png') !!}" />
							@elseif(strpos($item->desc, '_LIGHT_') !== false) <img src="{!! asset('theme/2.7/images/icons/light.png') !!}" />
							@elseif(strpos($item->desc, '_DARK_') !== false) <img src="{!! asset('theme/2.7/images/icons/dark.png') !!}" />
							@endif
						</td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				{!! $items->render() !!}
				@endif
			</div>
		</div>
@stop
