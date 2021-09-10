<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use DomainException;
use Illuminate\Http\Request;
use Throwable;

class ClienteController extends Controller
{
    private Cliente $repository;

    public function __construct()
    {
        $this->repository = new Cliente;
    }

    public function index()
    {
        try {
            if(!$data = $this->repository->paginate())
                throw new DomainException('sem clientes cadastrados');

            return $this->sendResponse($data, 'lista de clientes');
        } catch (Throwable $th) {
            return $this->sendError(
                $th->getMessage()
            );
        }
    }

    public function show(int $id)
    {
        try {
            if(!$data = $this->repository->find($id))
                throw new DomainException('cliente não encontrado');

            return $this->sendResponse($data, 'detalhes de cliente');
        } catch (Throwable $th) {
            return $this->sendError(
                $th->getMessage()
            );
        }
    }

    public function save(Request $request)
    {
        $this->validate($request, $this->repository->validation_rules());

        try {
            $create = $this->repository->create(
                $request->only('nome', 'cnpj', 'data_cadastro', 'endereco', 'telefone')
            );

            if(!$create)
                throw new DomainException('cliente não cadastrado');

            return $this->sendResponse($create, 'cliente cadastrado');
        } catch (Throwable $th) {
            return $this->sendError(
                $th->getMessage()
            );
        }
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, $this->repository->validation_rules($id));
        try {
            $update = $this->repository->find($id)->update(
                $request->only('nome', 'cnpj', 'data_cadastro', 'endereco', 'telefone')
            );

            if(!$update)
                throw new DomainException('cliente não atualizado');

            return $this->sendResponse($update, 'cliente atualizado');
        } catch (Throwable $th) {
            return $this->sendError(
                $th->getMessage()
            );
        }
    }

    public function destroy(int $id)
    {
        try {
            $destroy = $this->repository->destroy($id);

            if(!$destroy)
                throw new DomainException('cliente não excluído');

            return $this->sendResponse($destroy, 'cliente excluído');
        } catch (Throwable $th) {
            return $this->sendError(
                $th->getMessage()
            );
        }
    }

}
