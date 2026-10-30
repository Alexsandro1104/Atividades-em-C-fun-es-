<?php


class Curso{
    private ?int $id;
    private ?string $nome;
    private ?string $turno;

    //metodos

    public function __toString()
    {
        return $this->nome . " (" . $this->getTurnoDesc() . ")";
    }

    public function getTurnoDesc()
    {
        if ($this->turno == "M")
            return "Matutino";

        else if ($this->turno == "V")
            return "Vespertino";

        else if ($this->turno == "N")
            return "Noturno";

        return "invalido";
    }
 

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of turno
     */
    public function getTurno(): ?string
    {
        return $this->turno;
    }

    /**
     * Set the value of turno
     */
    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;

        return $this;
    }
}   