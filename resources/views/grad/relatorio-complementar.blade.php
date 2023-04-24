@extends('layouts.app')

@section('content')
  <h4>Relatório complementar <i class="fas fa-angle-right"></i>
    Forneça uma lista de nomes (1 por linha)
  </h4>

  <form method="POST" action="">
    @csrf
    <div class="form-group">
      <textarea name="nomes" class="form-control" id="exampleFormControlTextarea1" rows="4">{{ $nomes }}</textarea>
    </div>
    <div class="form-group form-inline">
      Período de
      <input class="form-control mx-2 col-1" type="number" name="anoIni" value="{{ $anoIni ?? date('Y') - 5 }}" min="1970" max="{{ date('Y') }}"> a
      <input class="form-control mx-2 col-1" type="number" name="anoFim" value="{{ $anoFim ?? date('Y') - 1 }}" min="1970" max="{{ date('Y') }}">
    </div>
    <button type="submit" class="btn btn-sm btn-primary spinner">Enviar</button>

  </form>

  @if ($naoEncontrados)
    <hr>
    <div class="h4">Não encontrados</div>
    @foreach ($naoEncontrados as $nome)
      {{ $nome }}<br>
    @endforeach
  @endif


  @if ($pessoas)
    <hr>
    <div class="h4 mt-3">Resultados</div>
    <table class="table table-bordered table-hover table-sm datatable-simples">
      <thead>
        <tr>
          <th>Unidade</th>
          <th>Depto</th>
          <th>No. USP</th>
          <th>Nome</th>
          <th>Lattes</th>
          <th>Resumo CV</th>
          <th>Artigos completos em periódicos</th>
          <th>Livros publicados</th>
          <th>Capítulos de livros</th>
          <th>Textos em jornais/revistas</th>
          <th>Trabalhos publicados em anais</th>
          <th>Apresentação de trabalho</th>
          <th>Outras Produções Bibliográficas</th>
          <th>Prêmios(todos)</th>
          <th>Trabalhos técnicos</th>
          <th>Organização de eventos</th>
          <th>Outras produções técnicas</th>
          <th>Cursos de curta duração</th>
          <th>Material didático instrucional</th>
          <th>Orientações concluídas de IC</th>
          <th>Orientações em andamento de IC</th>
          <th>Orientações concluídas de TCC</th>
          <th>Orientações concluídas de mestrado</th>
          <th>Orientações em andamento de mestrado</th>
          <th>Orientações concluídas de doutorado</th>
          <th>Orientações em andamento de doutorado</th>
          <th>Orientações concluídas de pós doutorado</th>
          <th>Orientações em andamento de pós doutorado</th>
          <th>Orientações concluídas de monografias de cursos de aperfeicoamento ou especialização</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($pessoas as $pessoa)
          <tr>
            <td>{{ $pessoa['unidade'] }}</td>
            <td>{{ $pessoa['departamento'] }}</td>
            <td>{{ $pessoa['codpes'] }}</td>
            <td>
              <a href="{{ route('pessoas.show', $pessoa['codpes']) }}" class="showPessoaModal">{{ $pessoa['nome'] }}</a>
            </td>
            <td>
              <a href="https://lattes.cnpq.br/{{ $pessoa['lattes'] }}" target="lattes">
                https://lattes.cnpq.br/{{ $pessoa['lattes'] }}
              </a>
            </td>

            <td title="{{ $pessoa['resumoCV'] }}"
              style="max-width: 100px;overflow:hidden; white-space: nowrap; text-overflow: ellipsis;">
              {{ $pessoa['resumoCV'] }}
            </td>
            <td>{{ count($pessoa['artigos']) }}</td>
            <td>{{ count($pessoa['livrosPublicados']) }}</td>
            <td>{{ count($pessoa['capitulosLivros']) }}</td>
            <td>{{ count($pessoa['textosJornaisRevistas']) }}</td>
            <td>{{ count($pessoa['trabalhosAnais']) }}</td>
            <td>{{ count($pessoa['apresentacaoTrabalho']) }}</td>
            <td>{{ count($pessoa['outrasProducoesBibliograficas']) }}</td>
            <td>{{ count($pessoa['premios']) }}</td>
            <td>{{ count($pessoa['trabalhosTecnicos']) }}</td>
            <td>{{ count($pessoa['organizacaoEventos']) }}</td>
            <td>{{ count($pessoa['outrasProducoesTecnicas']) }}</td>
            <td>{{ count($pessoa['cursosCurtaDuracao']) }}</td>
            <td>{{ count($pessoa['materialDidaticoInstrucional']) }}</td>
            <td>{{ count($pessoa['orientacoesConcluidasIC']) }}</td>
            <td>{{ count($pessoa['orientacoesEmAndamentoIC']) }}</td>
            <td>{{ count($pessoa['orientacoesConcluidasTccGraduacao']) }}</td>
            <td>{{ count($pessoa['orientacoesConcluidasMestrado']) }}</td>
            <td>{{ count($pessoa['orientacoesEmAndamentoMestrado']) }}</td>
            <td>{{ count($pessoa['orientacoesConcluidasDoutorado']) }}</td>
            <td>{{ count($pessoa['orientacoesEmAndamentoDoutorado']) }}</td>
            <td>{{ count($pessoa['orientacoesConcluidasPosDoutorado']) }}</td>
            <td>{{ count($pessoa['orientacoesEmAndamentoPosDoutorado']) }}</td>
            <td>{{ count($pessoa['monografiasConcluidasAperfeicoamentoEspecializacao']) }}</td>



          </tr>
        @endforeach
      </tbody>
    </table>
  @endif

@endsection
