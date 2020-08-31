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
        <th style="background-color: #fffe1f;">Potential Harm</th>
        <th style="background-color: #fffe1f;">Aquatic</th>
        <th style="background-color: #fffe1f;">Bees</th>
        <th style="background-color: #fffe1f;">Earthworm</th>
        <th style="background-color: #fffe1f;">Birds</th>
        <th style="background-color: #fffe1f;">Leachability</th>
        <th style="background-color: #fffe1f;">Carcinogenicity</th>
        <th style="background-color: #fffe1f;">Mutagenicity</th>
        <th style="background-color: #fffe1f;">EDC</th>
        <th style="background-color: #fffe1f;">Reproduction</th>
        <th style="background-color: #fffe1f;">Ache</th>
        <th style="background-color: #fffe1f;">Neurotoxicant</th>
        <th style="background-color: #fffe1f;">WHO Classification</th>
        <th style="background-color: #fffe1f;">EU Approved</th>
        <th style="background-color: #fffe1f;">Agrochem Products</th>
    </tr>
    </thead>
    <tbody>
    @forelse($active_ingredients as $item)
        <tr>
            <td style="font-size:10px; vertical-align: top;">{{ $item->id }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->name }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->potential_harm }}</td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->aquatic }}<br>
                {!! $item->aquatic_desc !!}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->bees }}<br>
                {!! $item->bees_desc !!}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->earthworm }}<br>
                {!! $item->earthworm_desc !!}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->birds }}<br>
                {!! $item->birds_desc !!}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->leachability }}<br>
                {!! $item->leachability_desc !!}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->carcinogenicity }}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->mutagenicity }}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->edc }}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->reproduction }}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->ache }}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->neurotoxicant }}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->who_classification }}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                {{ $item->eu_approved }}
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->agrochem))
                    @forelse($item->agrochem as $itemAgrochem)
                        {{ $itemAgrochem->product_name }}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
        </tr>
    @empty
    @endforelse
    </tbody>
</table>
