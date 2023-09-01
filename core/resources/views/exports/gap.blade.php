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
        <th style="background-color: #fffe1f;">Category</th>
        <th style="background-color: #fffe1f;">Practices</th>
        <th style="background-color: #fffe1f;">Pests, Diseases, Weeds</th>
        <th style="background-color: #fffe1f;">References</th>
    </tr>
    </thead>
    <tbody>
    @forelse($gap as $item)
        <tr>
            <td style="font-size:10px; vertical-align: top;">{{ $item->id }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->name }}</td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->category))
                    @forelse($item->category as $itemCategory)
                        {{ $itemCategory }}@if (!$loop->last), @endif
                    @empty
                    @endforelse
                @endif
            </td>
            <td style="font-size:10px; vertical-align: top;">
                @if (!@empty($item->practices))
                    @forelse($item->practices as $itemPractices)
                        {{ \Soundasleep\Html2Text::convert($itemPractices, array('ignore_errors' => true)) }}
                        @if (!$loop->last)
                            <br>
                        @endif
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
                @if (!@empty($item->references))
                    @forelse($item->references as $itemReferences)
                        {!! $itemReferences !!}
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
