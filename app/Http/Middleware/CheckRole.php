<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Karyawan;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $karyawanID = auth()->user()->karyawan_id;
        $karyawan = Karyawan::find($karyawanID);

        $request->session()->put('role', $karyawan->role->nama);
        $request->session()->put('karyawan_id', $karyawan->id);

        if (!in_array($karyawan->role->nama, $roles)) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}