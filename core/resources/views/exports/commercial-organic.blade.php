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
        <th style="background-color: #fffe1f;">PCPB Number</th>
        <th style="background-color: #fffe1f;">Manufacturer</th>
        <th style="background-color: #fffe1f;">Distributor</th>
        <th style="background-color: #fffe1f;">Category</th>
        <th style="background-color: #fffe1f;">Contact Details</th>
        <th style="background-color: #fffe1f;">Application Details</th>
        <th style="background-color: #fffe1f;">Pests, Diseases, Weeds</th>
        <th style="background-color: #fffe1f;">Control Methods</th>
        <th style="background-color: #fffe1f;">External Links</th>
    </tr>
    </thead>
    <tbody>
    @forelse($com as $item)
        <tr>
            <td style="font-size:10px; vertical-align: top;">{{ $item->id }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->name }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->pcpb_number }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->manufacturer }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->distributor }}</td>
            <td style="font-size:10px; vertical-align: top;">{{ $item->category }}</td>
            <td style="font-size:10px; vertical-align: top;">{!! $item->contact_details !!}</td>
            <td style="font-size:10px; vertical-align: top;">
{{--                @isset($item->application_details)--}}
                    @if (!@empty($item->application_details))
                        @forelse($item->application_details as $itemApplicationDetails)
                            {{ \Soundasleep\Html2Text::convert($itemApplicationDetails, array('ignore_errors' => true)) }}
                            @if (!$loop->last)
                                <br>
                            @endif
                            @empty
                        @endforelse
                    @endif
{{--                @endisset--}}
            </td>
            <td style="font-size:10px; vertical-align: top;">
{{--                @isset($item->pestsDiseaseWeed)--}}
                    @if (!@empty($item->pestsDiseaseWeed))
                        @forelse($item->pestsDiseaseWeed as $itemPdw)
                            {{ $itemPdw->name }}@if (!$loop->last), @endif
                        @empty
                        @endforelse
                    @endif
{{--                @endisset--}}
            </td>
            <td style="font-size:10px; vertical-align: top;">
{{--                @isset($item->controlMethods)--}}
                    @if (!@empty($item->controlMethods))
                        @forelse($item->controlMethods as $itemControlMethods)
                            {{ $itemControlMethods->name }}@if (!$loop->last), @endif
                        @empty
                        @endforelse
                    @endif
{{--                @endisset--}}
            </td>
            <td style="font-size:10px; vertical-align: top;">
{{--                @isset($item->external_links)--}}
                    @if (!@empty($item->external_links))
                        @forelse($item->external_links as $itemExternalLinks)
                            {{ \Soundasleep\Html2Text::convert($itemExternalLinks, array('ignore_errors' => true)) }}
                            @if (!$loop->last)
                                <br>
                            @endif
                        @empty
                        @endforelse
                    @endif
{{--                @endisset--}}
            </td>
        </tr>
    @empty
    @endforelse
    </tbody>
</table>
