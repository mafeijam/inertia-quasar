<!DOCTYPE html>
<html>
<head>
    <title>Client</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        @font-face {
            font-family: TaipeiSans;
            src: url('{{ storage_path("fonts/TaipeiSansTCBeta-Regular.ttf") }}') format('truetype');
        }

        @page {
            margin: 0.5cm 0.5cm
        }

        * {
            font-family: TaipeiSans;
            color: #333;
        }

        .table-header {
            border-collapse: collapse;
            font-size: 12px;
            border: 1px solid transparent;
            width: 100%;
            margin-top: 8px;
        }

        .table {
            border-collapse: collapse;
            font-size: 12px;
            vertical-align: middle;
            border: 1px solid #666;
            width: 100%;
            margin-top: 8px;
        }

        .table td {
            padding: 8px;
            border-top: 1px solid #666;
            border-bottom: 1px solid #666;
            /* border: 1px solid #666; */
            width: 8.33333%;
        }

        td.border-r {
            border-right: 1px solid #666;
        }

        td.border-f {
            border: 1px solid #666;
            padding: 0px 8px;
        }

        td.border-t-none {
            border-top: 1px solid transparent;
        }

        td.border-b-none {
            border-bottom: 1px solid transparent;
        }

        .logo {
            width: 5cm;
            padding-bottom: 12px;
        }

        .text-sm {
            font-size: 8px;
            padding-bottom: 6px;
        }

        .inline-field input,
        .inline-field label {
            display: inline-block;
            margin-bottom: -3px;
            vertical-align: middle;
        }

        .inline-field label {
            margin-left: 12px;
        }

        .heading {
            text-align: center;
            color: #00356C;
        }

        .blue {
            background: #00356C;
            color: #FFF;
        }
    </style>
</head>
<body>
    <table class="table-header">
        <tr>
            <td>
                <img class="logo" src="{{ $image }}">
                <div class="text-sm">香港上環干諾道西3號億利商業大廈1101-03室</div>
                <div class="text-sm">Room 1101-03, 11/F, Yardley Commercial Building, 3 Connaught Road West, Hong Kong </div>
                <div class="text-sm">Website: https://www.victorysec.com.hk &nbsp;&nbsp;Email: cs@victorysec.com.hk &nbsp;&nbsp;Tel: 2525 2437 &nbsp;&nbsp;Fax: 2810 7616 &nbsp;&nbsp;CE NO.: ABN091</div>
            </td>
            <td class="border-f">
                <div class="text-sm">For Office Use Only 公司專用</div>
                <div style="font-size: 10px; padding-top: 6px;">AE CODE:</div>
                <div style="font-size: 10px; padding-top: 6px;">Date:</div>
                <div style="font-size: 10px; padding-top: 6px;">Account No:</div>
            </td>
        </tr>
    </table>

    <table class="table">
        @include('pdf._table-td')
        <tr>
            <td colspan="12" class="heading">個人帳戶開戶表格 (網上)</td>
        </tr>
        <tr>
            <td colspan="12" class="blue">賬戶類別</td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>現金帳戶</label>
                </div>
            </td>
            <td colspan="3">
                <div class="inline-field">
                    <input type="checkbox">
                    <label>保證金帳戶</label>
                </div>
            </td>
            <td colspan="3">
                <div class="inline-field">
                    <input type="checkbox">
                    <label>期貨帳戶</label>
                </div>
            </td>
            <td colspan="3">
                <div class="inline-field">
                    <input type="checkbox">
                    <label>環球股票交易</label>
                </div>
            </td>
        </tr>
    </table>

    <table class="table">
        @include('pdf._table-td')
        <tr>
            <td class="blue" colspan="12">個人資料</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">稱謂</td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>先生</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>女士</label>
                </div>
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">姓名 (中)</td>
            <td colspan="4" class="border-r">XXXX</td>
            <td colspan="2" class="border-r">姓名 (英)</td>
            <td colspan="4">XXXX</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">身份證號碼</td>
            <td colspan="4" class="border-r">XXXX</td>
            <td colspan="2" class="border-r">出生日期 (年-月-日)</td>
            <td colspan="4">XXXX</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">出生地點</td>
            <td colspan="4" class="border-r">XXXX</td>
            <td colspan="2" class="border-r">國籍</td>
            <td colspan="4">XXXX</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">聯絡電話</td>
            <td colspan="4" class="border-r">XXXX</td>
            <td colspan="2" class="border-r">電郵</td>
            <td colspan="4">XXXX</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">住宅地址</td>
            <td colspan="10">XXXX</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">教育程度</td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>中學或以下</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>大專</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>學士或以上</label>
                </div>
            </td>
            <td colspan="4"></td>
        </tr>
    </table>

    <table class="table">
        @include('pdf._table-td')
        <tr>
            <td class="blue" colspan="12">受僱資料</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">就業狀況</td>
            <td colspan="4" class="border-r">XXXX</td>
            <td colspan="2" class="border-r">受僱機構名稱</td>
            <td colspan="4">XXXX</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">業務性質</td>
            <td colspan="4" class="border-r">XXXX</td>
            <td colspan="2" class="border-r">服務年資</td>
            <td colspan="4">XXXX</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">現時職位</td>
            <td colspan="4" class="border-r">XXXX</td>
            <td colspan="2" class="border-r">辦公室電話</td>
            <td colspan="4">XXXX</td>
        </tr>
        <tr>
            <td colspan="2" class="border-r">辦公室地址</td>
            <td colspan="10" class="border-r">XXXX</td>
        </tr>
    </table>

    <table class="table">
        @include('pdf._table-td')
        <tr>
            <td class="blue" colspan="12">財務狀況</td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" class="border-r">每年收入</td>
            <td colspan="3" class="border-b-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>小於HK$200,000</label>
                </div>
            </td>
            <td colspan="3" class="border-b-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>HK$200,000-500,000</label>
                </div>
            </td>
            <td colspan="4" class="border-b-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>HK$500,001-1,000,000</label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="border-t-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>HK$1,000,001-3,000,000</label>
                </div>
            </td>
            <td colspan="3" class="border-t-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>大於HK$3,000,000</label>
                </div>
            </td>
            <td colspan="4" class="border-t-none"></td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" class="border-r">資產淨值</td>
            <td colspan="3" class="border-b-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>小於HK$1,000,000</label>
                </div>
            </td>
            <td colspan="3" class="border-b-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>HK$1,000,000-5,000,000</label>
                </div>
            </td>
            <td colspan="4" class="border-b-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>HK$5,000,001-8,000,000</label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="border-t-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>HK$8,000,001-30,000,000</label>
                </div>
            </td>
            <td colspan="3" class="border-t-none">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>大於HK$30,000,000</label>
                </div>
            </td>
            <td colspan="4" class="border-t-none"></td>
        </tr>
    </table>

    <table class="table">
        <tr>
            <td colspan="6">6 col</td>
            <td colspan="6">6 col</td>
        </tr>
        <tr>
            <td colspan="2">2 col</td>
            <td colspan="2">2 col</td>
            <td colspan="2">2 col</td>
            <td colspan="2">2 col</td>
            <td colspan="2">2 col</td>
            <td colspan="2">2 col</td>
        </tr>
        <tr>
            <td colspan="3">3 col</td>
            <td colspan="3">3 col</td>
            <td colspan="3">3 col</td>
            <td colspan="3">3 col</td>
        </tr>
        <tr>
            <td colspan="4">4 col</td>
            <td colspan="4">4 col</td>
            <td colspan="4">4 col</td>
        </tr>
        <tr>
            <td colspan="2">住宅地址</td>
            <td colspan="4">4 col</td>
            <td colspan="2">2 col</td>
            <td colspan="4">4 col</td>
        </tr>
    </table>


    {{-- <table width="100%">
        <tr>
            <td class="heading" colspan="8">個人帳戶開戶表格</td>
        </tr>
        <tr>
            <td class="blue" colspan="8">賬戶類別</td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>現金帳戶</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox">
                    <label>保證金帳戶</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox">
                    <label>期貨帳戶</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox">
                    <label>環球股票交易</label>
                </div>
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td class="blue" colspan="8">個人資料</td>
        </tr>
        <tr>
            <td>稱謂</td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox" checked="checked">
                    <label>先生</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline-field">
                    <input type="checkbox">
                    <label>女士</label>
                </div>
            </td>
            <td colspan="3"></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width="15%">姓名 (中)</td>
            <td>XXXX</td>
            <td width="15%">姓名 (英)</td>
            <td>XXXX</td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td>身份證號碼</td>
            <td colspan="3">XXXX</td>
            <td>出生日期 (年-月-日)</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td>出生地點</td>
            <td colspan="3">XXXX</td>
            <td>國籍</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td>聯絡電話</td>
            <td colspan="3">XXXX</td>
            <td>電郵</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td>住宅地址</td>
            <td colspan="3">XXXX</td>
            <td>教育程度</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td class="blue" colspan="8">受僱資料</td>
        </tr>
        <tr>
            <td>就業狀況</td>
            <td colspan="3">XXXX</td>
            <td>受僱機構名稱</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td>業務性質</td>
            <td colspan="3">XXXX</td>
            <td>服務年資</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td>現時職位</td>
            <td colspan="3">XXXX</td>
            <td>辦公室電話</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td>辦公室地址</td>
            <td colspan="7">XXXX</td>
        </tr>
        <tr>
            <td class="blue" colspan="8">財務狀況</td>
        </tr>
        <tr>
            <td>每年收入</td>
            <td colspan="3">XXXX</td>
            <td>資產淨值</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td>資金來源地</td>
            <td colspan="3">XXXX</td>
            <td>最初資金來源</td>
            <td colspan="3">XXXX</td>
        </tr>
        <tr>
            <td>持續資金來源</td>
            <td colspan="3">XXXX</td>
            <td>住屋業權</td>
            <td colspan="3">XXXX</td>
        </tr>
    </table> --}}
</body>
</html>
