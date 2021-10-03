<?php
ini_set('display_erros', true);
error_reporting(E_ALL);

/**
 * Classe para manipulaçoes de imagem via formulário.
 * Insere o caminho da imagem no banco de dados e salva a imagem no servidor.
 */
class Imagem
{
  /** @var string $_IMAGEM Armazena o caminho da imagem. */
  private $_IMAGEM;

  /** @var array $_UP Tratamento da imagem. */
  private $_UP;

  /** @var array $_FILES Armazena todo o array de formulário da imagem. */
  private $_FILES;

  /** @var array $_EXTENSAO Armazena a extensão da imagem enviada. */
  private $_EXTENSAO;

  /** @var string $_HEADER URL para redirecionamentos. */
  private $_HEADER;

  public function __construct(string $caminho, string $url,  bool $renomear = false, int $tamanho = 2, array $extensoes = array('jpg', 'png', 'jpeg'))
  {
    $this->_UP['pasta'] = $caminho;
    $this->_UP['tamanho'] = 1024 * 1024 * $tamanho;
    $this->_UP['extensoes'] = $extensoes;
    $this->_UP['renomeia'] = $renomear;
    $this->_HEADER = $url;
  }

  /**
   * Realiza o upload da imagem!
   *
   * Tem por finalidade realizar a chamada de todas as funções da classe
   * para verificamento de erros, validações de extensões, renomear o arquivo e salvar no servidor.
   *
   * @param array $files Deve ser passao a variavel global "$_FILES" com o array enviado pelo formulário.
   * @return string Retorna uma string com o nome do arquivo a ser salvo no banco de dados.
   **/
  public function cadastrar(array $files)
  {
    $this->_FILES = $files;
    $this->verificarErros();
    $this->validarExtensao();
    $this->verificarTamanho();
    $this->renomear();
    $this->salvarNaPasta();
    return $this->_IMAGEM;
  }

  /**
   * Cria os indices de erros no array _UP e verifica os mesmos.
   * 
   * Tem por finalidade criar um array de erros na variável $_UP e verificar se ocorreu algum erro pelo array $_FILES
   * caso ocorra o erro, faz o redirecionamento e salva o mesmo na sessão para o front-end!
   * 
   */
  public function verificarErros()
  {
    $this->_UP['erros'][0] = 'Não houve erro';
    $this->_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $this->_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $this->_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $this->_UP['erros'][4] = 'Não foi feito o upload do arquivo';

    if ($this->_FILES['imagem']['error'] != 0) {

      $_SESSION['danger'] = "Não foi possível fazer o upload, erro:<br />" . $this->_UP['erros'][$this->_FILES['imagem']['error']];
      header('Location: ' . $this->_HEADER);
      die();
    }
  }

  /**
   * Faz validações de extensões permitidas.
   * 
   * Tem por finalidade identificar a extensão do arquivo enviado e verificar na lista de extensões permitida se o mesmo se encontra
   * caso não esteja, faz o redirecionamento e salva o erro na sessão para o front-end.
   * 
   */
  public function validarExtensao()
  {

    $this->_EXTENSAO = explode('.', $this->_FILES['imagem']['name']);
    $this->_EXTENSAO = end($this->_EXTENSAO);

    if (array_search($this->_EXTENSAO, $this->_UP['extensoes']) === false) {

      $_SESSION['danger'] = 'Por favor, envie arquivos com as seguintes extensões: ' . implode(", ", $this->_UP['extensoes']);
      header('Location: ' . $this->_HEADER);
      die();
    }
  }

  /**
   * Verifica se o tamanho do arquivo exede o permitido.
   * 
   * Tem por finalidade identificar o tamanho do arquivo permitido, verificar o tamanho do arquivo submetido e por fim
   * efetuar a verificação se o arquivo submetido é maior que o permitido. Caso exeda o tamanho é feito o redirecionamento e salva o erro na sessão para o front-end.
   * 
   */
  public function verificarTamanho()
  {
    if ($this->_UP['tamanho'] < $this->_FILES['imagem']['size']) {
      $_SESSION['danger'] = 'O arquivo enviado é muito grande, envie arquivos de até ' . $this->_UP['tamanho'] / 1024 / 1024 . 'MB';
      header("Location: $this->_HEADER");
      die();
    }
  }

  /**
   * Verifica se a opção de renomear está ativada e faz as alterações.
   * 
   * Tem por finalidade identificar se a variável $this->_UP['renomeia'] é igual à true, caso seja, renomeia o arquivo para o timestamp com a extensão .jpg. 
   * Caso seja false mantém o nome e a extensão original.
   * 
   */
  public function renomear()
  {

    // Primeiro verifica se deve trocar o nome do arquivo
    if ($this->_UP['renomeia'] == true) {
      // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
      $this->_IMAGEM = time() . '.jpg';
    } else {
      // Mantém o nome original do arquivo
      $this->_IMAGEM = $this->_FILES['imagem']['name'];
    }
  }

  /**
   * Verifica se é possivel salvar o arquivo no servidor e caso seja possivel executa o salvamento.
   * 
   * Tem por finalidade identificar se é possivel salvar o arquivo na pasta especificado do servidor. 
   * Caso seja possivel, efetua o salvemnto. Caso não seja, faz o redirecionamento e salva o erro na sessão para o front-end
   * 
   */
  public function salvarNaPasta()
  {

    // Verifica se é possível mover o arquivo para a pasta escolhida
    if (!move_uploaded_file($this->_FILES['imagem']['tmp_name'], $this->_UP['pasta'] . $this->_IMAGEM)) {
      // Não foi possível fazer o upload, provavelmente a pasta está incorreta
      $_SESSION['danger'] = "Não foi possível enviar o arquivo, tente novamente";
      header('Location: ' . $this->_HEADER);
      die();
    }
  }
}