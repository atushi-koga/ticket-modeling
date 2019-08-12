<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            border: solid 2px black;
        }

        table th, table td {
            border: dashed 1px black;
        }
    </style>
</head>
<body>
<div>
    <div>チケット料金</div>
    <table>
        <thead>
        <tr>
            <th></th>
            <th colspan="2">平日</th>
            <th colspan="2">土日祝</th>
            <th></th>
            <th rowspan="2">備考</th>
        </tr>
        <tr>
            <th></th>
            <th>〜20:00</th>
            <th>20:00〜<br>（レイト）</th>
            <th>〜20:00</th>
            <th>20:00〜<br>（レイト）</th>
            <th>映画の日</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>一般</td>
            <td>1,800</td>
            <td>1,300</td>
            <td>1,800</td>
            <td>1,300</td>
            <td>1,100</td>
            <td></td>
        </tr>
        <tr>
            <td>シニア（70才以上）</td>
            <td>1,100</td>
            <td>1,100</td>
            <td>1,100</td>
            <td>1,100</td>
            <td>1,100</td>
            <td></td>
        </tr>
        <tr>
            <td>学生（大・専）</td>
            <td>1,500</td>
            <td>1,300</td>
            <td>1,500</td>
            <td>1,300</td>
            <td>1,100</td>
            <td></td>
        </tr>
        <tr>
            <td>中・高校生</td>
            <td>1,000</td>
            <td>1,000</td>
            <td>1,000</td>
            <td>1,000</td>
            <td>1,000</td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<div>入力フォーム</div>
<form method="post" action="{{ route('fee') }}">
    @csrf
    <div>
        <div>
            <label for="type">区分：</label>
            <select name="price_id" id="type">
                <option value="">選択してください</option>
                <option value="1">一般</option>
                <option value="2-senior">一般（シニア）</option>
                <option value="3">学生（大・専）</option>
                <option value="4">中・高校生</option>
            </select>
        </div>
        <div>
            <label for="date-time">上映開始日時：</label>
            <input type="text" name="date_time" id="date-time">
        </div>
    </div>
    <input type="submit">
</form>
</body>
</html>
