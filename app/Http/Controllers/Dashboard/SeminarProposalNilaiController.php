<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SeminarProposal;
use App\Models\SeminarProposalNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeminarProposalNilaiController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.seminar_proposal_nilai.index', [
            'seminar_proposal_nilais' => SeminarProposalNilai::orderByDesc('created_at')->get(),
        ]);
    }

    public function nilai(SeminarProposal $seminarProposal)
    {
        $dosenPengujiId = auth()->user()->dosen->dosen_pengujis->pluck('id');
        $seminarProposalNilai = $seminarProposal->seminar_proposal_nilais()->where('dosen_penguji_id', $dosenPengujiId)->first();

        return view('pages.dashboard.seminar_proposal.nilai', [
            'seminarProposal' => $seminarProposal,
            'seminarProposalNilai' => $seminarProposalNilai,
        ]);
    }

    public function update(Request $request, SeminarProposal $seminarProposal)
    {
        $dosenPenguji = auth()->user()->dosen->dosen_pengujis->pluck('id');

        $validated = $request->validate([
            'dosen_penguji_id' => 'required',
            'seminar_proposal_id' => 'required',
            'nilai' => 'required|integer'
        ]);

        $seminarProposalNilai = $seminarProposal->seminar_proposal_nilais()->where('dosen_penguji_id', $dosenPenguji)->first();
        $seminarProposalNilai->update($validated);

        // membandingkan jumlah nilai seminar proposal yang diberikan oleh semua dosen penguji dengan jumlah total dosen penguji yang seharusnya memberikan nilai.
        $countNilaiProposal = ($seminarProposal->seminar_proposal_nilais()->count() == $seminarProposal->seminar_proposal_nilais->pluck('dosen_penguji_id')->count());

        if ($countNilaiProposal) {
            $totalNilai = $seminarProposal->seminar_proposal_nilais()->sum('nilai');
            $nilaiAkhir = $totalNilai / $seminarProposal->seminar_proposal_nilais()->count();

            // update data nilai akhir seminar proposal
            $seminarProposal->update([
                'nilai_akhir' => $nilaiAkhir
            ]);
        }

        return redirect()->route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id])->with('success', 'Seminar Proposal berhasil dinilai.');
    }
}
