@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<a href="http://127.0.0.1:8000"><img src='https://i.imgur.com/5kn2FBj.png' class="logo" alt="Laravel Logo"></a>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
