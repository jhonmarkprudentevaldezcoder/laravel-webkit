<?php

namespace App\Traits\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;

trait TxnExceptionHandler
{
    /**
     * Execute a process within a database transaction with error handling.
     *
     * @param  callable  $process  The process to execute within the transaction.
     * @param  string  $message  The success message to return on successful execution.
     * @return \Illuminate\Http\JsonResponse  The response with success or error message.
     */
    public function handleTxnExceptions(callable $process, string $message)
    {
        DB::beginTransaction();

        try {
            $result = $process();

            $response = ['message' => $message];

            if ($result) {
                $response['data'] = $result;
            }

            DB::commit();

            return response()->json($response, 200);
        } catch (QueryException $ex) {
            DB::rollBack();
            return response()->json(['message' => $ex->getMessage()], 400);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['message' => $ex->getMessage()], 400);
        }
    }
}