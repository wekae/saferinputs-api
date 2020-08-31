{{--Inline CSS Options--}}
{{--background(-color) 	#000000--}}
{{--color 	#FFFFFF--}}
{{--font-weight 	bold--}}
{{--font-style 	italic--}}
{{--font-weight 	bold--}}
{{--font-size 	20px--}}
{{--font-family 	Open Sans--}}
{{--text-decoration 	underline--}}
{{--text-align 	center--}}
{{--vertical-align 	middle--}}
{{--border(-*) 	1px dashed #CCC--}}
{{--width 	100(px)--}}
{{--height 	1100(px)--}}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table>
    <thead>
    <tr>
        <th style="background-color: #fffe1f;">ID</th>
        <th style="background-color: #fffe1f;">Name</th>
        <th style="background-color: #fffe1f;">Type</th>
        <th style="background-color: #fffe1f;">Scientific Name</th>
        <th style="background-color: #fffe1f;">Local Names</th>
        <th style="background-color: #fffe1f;">Description</th>
        <th style="background-color: #fffe1f;">Effect On Crops</th>
        <th style="background-color: #fffe1f;">References</th>
        <th style="background-color: #fffe1f;">Crops</th>
        <th style="background-color: #fffe1f;">Agrochem Products</th>
        <th style="background-color: #fffe1f;">Gap</th>
        <th style="background-color: #fffe1f;">Homemade Organic Solutions</th>
        <th style="background-color: #fffe1f;">Commercial Organic Products</th>
        <th style="background-color: #fffe1f;">Control Methods</th>
    </tr>
    </thead>
    <tbody>
    @forelse($pdw as $item)
        <tr>
            <td style="font-size:10px; vertical-align: top;">{{ $item->id }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->name }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->type }}</td>
            <td style="font-size:10px; vertical-align: top;">{!!nl2br($item->scientific_name) !!}</td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->localNames))
                    @forelse($item->localNames as $itemLocalName)
                        {{ $itemLocalName->local_name }}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">{!!nl2br($item->description_pest)!!}</td>
            <td style="font-size:10px; vertical-align: top;">{!!nl2br($item->description_impact)!!}</td>
            <td style="font-size:10px; vertical-align: top;">{!!nl2br($item->references)!!}</td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->crops))
                    @forelse($item->crops as $itemCrops)
                        {{$itemCrops->name}}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->agrochemProducts))
                    @forelse($item->agrochemProducts as $itemAgrochems)
                        {{$itemAgrochems->product_name}}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->gap))
                    @forelse($item->gap as $itemGaps)
                        {{$itemGaps->name}}
                        @if (!$loop->last)
                            <br>
                        @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->homemadeOrganic))
                    @forelse($item->homemadeOrganic as $itemHomemadeOrganic)
                        {{$itemHomemadeOrganic->name}}
                        @if (!$loop->last)
                            <br>
                        @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->commercialOrganic))
                    @forelse($item->commercialOrganic as $itemCommercialOrganic)
                        {{$itemCommercialOrganic->name}}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->controlMethods))
                    @forelse($item->controlMethods as $itemControlMethods)
                        {{$itemControlMethods->name}}
                        @if (!$loop->last)
                            <br>
                        @endif
                    @empty
                    @endforelse
                @endif
            </td>
        </tr>
    @empty
    @endforelse
    </tbody>
</table>
