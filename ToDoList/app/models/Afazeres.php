<?php 


class Afazeres 
{
	public $id;
	public $nome;
	public $data;
	public $descricao;


	function __construct($id=null,$nome=null,$data=null,$descricao=null)
	{
		$this->id     	 = $id;
		$this->nome   	 = $nome;
		$this->data   	 = $data;
		$this->descricao = $descricao;
	}


	public function getId()
    {
        return $this->fa_id;
    }
    /**
     * @param null $fa_id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    /**
     * @param null $fa_id
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getData()
    {
        return $this->data;
    }
    /**
     * @param null $fa_id
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    /**
     * @param null $fa_id
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    
}
?>