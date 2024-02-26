<h2>Relatório de vendas referente ao dia {{ $report->date }}</h2>
<p>Dados do vendedor:</p>
<ul>
    <li>Código: {{ $report->seller->id }}</li>
    <li>Nome: {{ $report->seller->name }}</li>
    <li>E-mail: {{ $report->seller->mail }}</li>
</ul>
<hr>
<p>
    @if ($report->sales)
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Valor</th>
                    <th>Comissão</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($report->sales as $sale)
                    <tr>
                        <td></td>
                        <td>{{ $sale->value }}</td>
                        <td>{{ $sale->comission }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th>{{ $report->salesTotal }}</th>
                    <th>{{ $report->commissionTotal }}</th>
                </tr>
            </tfoot>
        </table>
    @endif
</p>
