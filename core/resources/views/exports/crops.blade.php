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
        <th style="background-color: #fffe1f;">Pests, Diseases, Weeds</th>
        <th style="background-color: #fffe1f;">Agrochem Products</th>
    </tr>
    </thead>
    <tbody>
    @forelse($crops as $item)
        <tr>
            <td style="font-size:10px; vertical-align: top;">{{ $item->id }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->name }}</td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->pestsDiseaseWeed))
                    @forelse($item->pestsDiseaseWeed as $itemPdw)
                        {{ $itemPdw->name }}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
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
