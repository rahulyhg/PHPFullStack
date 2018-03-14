<?php

namespace App\Models\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="anunciantes")
 **/
class Anunciante {

     /**
     * @var int
     * @Id @Column(type="integer") 
     * @GeneratedValue
     */
    public $id;

    /**
     * @var string
     * @Column(type="string") 
     */
    public $nome;

    /**
     * @var string
     * @Column(type="string") 
     */
    public $endereco;

    /**
     * @var string
     * @Column(type="string") 
     */
    public $telefone;

     /**
     * Um anunciante tem muitos Anuncios.
     * @OneToMany(targetEntity="Anuncio", mappedBy="anunciante", cascade={"persist", "remove"})
     */
    public $anuncios;

    public function __construct() {
        $this->anuncios = new ArrayCollection();
    }

     /**
     * @return int id
     */
    public function getId(){
        return $this->id;
    }

     /**
     * @return string nome
     */
    public function getNome(){
        return $this->nome;
    }

     /**
     * @return App\Models\Entity\Anunciante
     */
    public function setNome($nome){
        $this->nome = $nome;

        return $this;
    }

     /**
     * @return string endereco
     */
    public function getEndereco(){
        return $this->endereco;
    }

     /**
     * @return App\Models\Entity\Anunciante
     */
    public function setEndereco($endereco){
        $this->endereco = $endereco;

        return $this;
    }

     /**
     * @return string telefone
     */
    public function getTelefone(){
        return $this->telefone;
    }

     /**
     * @return App\Models\Entity\Anunciante
     */
    public function setTelefone($telefone){
        $this->telefone = $telefone;
        
        return $this;
    }
    
    public function getAnuncios(){
       return $this->anuncios->toArray();
    }
    
    public function getUltimoAnuncio(){
        return $this->anuncios->current();
     }

    public function adicionaAnuncio($descricao){
        $anuncio = Anuncio::criar($descricao);
        $anuncio->setAnunciante($this);
        $this->anuncios->add($anuncio);
    }
    
     /**
     * @return App\Models\Entity\Anunciante
     */
    public function getValues() {
        return get_object_vars($this);
    }
}