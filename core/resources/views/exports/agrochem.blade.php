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
        <th style="background-color: #fffe1f;">Product Name</th>
        <th style="background-color: #fffe1f;">PCPB Number</th>
        <th style="background-color: #fffe1f;">Distributing Company</th>
        <th style="background-color: #fffe1f;">Toxic</th>
        <th style="background-color: #fffe1f;">WHO Class</th>
        <th style="background-color: #fffe1f;">Composition</th>
        <th style="background-color: #fffe1f;">Registrant</th>
        <th style="background-color: #fffe1f;">Type</th>
        <th style="background-color: #fffe1f;">Pre Harvest Interval (PHI)</th>
        <th style="background-color: #fffe1f;">Crops</th>
        <th style="background-color: #fffe1f;">Pests, Diseases, Weeds</th>
        <th style="background-color: #fffe1f;">Active Ingredients</th>
    </tr>
    </thead>
    <tbody>
    @forelse($agrochems as $item)
        <tr>
            <td style="font-size:10px; vertical-align: top;">{{ $item->id }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->product_name }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->pcpb_number }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->distributing_company }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->toxic }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->who_class }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->composition }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ \Soundasleep\Html2Text::convert($item->registrant, array('ignore_errors' => true)) }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->type }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->phi_days }}</td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->crops))
                    @forelse($item->crops as $itemCrops)
                        {{ $itemCrops->name }}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->pestsDiseaseWeed))
                    @forelse($item->pestsDiseaseWeed as $itemPdw)
                        {{ $itemPdw->name }}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->activeIngredients))
                    @forelse($item->activeIngredients as $itemActiveIngredients)
                        {{ $itemActiveIngredients->name }}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
        </tr>
    @empty
    @endforelse
    </tbody>
</table>
