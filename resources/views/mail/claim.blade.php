<table>
    <tr>
        <td>
            <h4>Жалоба от ({{$userInfo['phone']}})</h4>
        </td>
    </tr>
    <tr>
        <td>
            <span><b>Причина</b>: {{$claim}}</span>
        </td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
        <td>
            <span><b>Объявление</b>: {{$advInfo['name']}}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span><b>Содержимое</b>: {{$advInfo['description']}}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span><b>Автор</b>: +{{$advInfo['phone']}}</span>
        </td>
    </tr>
</table>