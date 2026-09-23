<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use App\Models\EventRegistration;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ScannerAndPdfTest extends TestCase
{
    use RefreshDatabase;

    public function test_scanner_page_and_pdf_export()
    {
        $user = User::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'super_admin',
            'status' => 'approved',
        ]);

        $event = Event::create([
            'title' => 'Disciples Revival Night 5.0',
            'description' => 'Ibadah kebangunan rohani pemuda & remaja DOT Teens.',
            'event_date' => '2026-10-10',
            'event_waktu' => '17:30',
            'location' => 'Main Sanctuary GBI ERC Sawangan',
            'image' => 'drn.jpeg',
        ]);

        EventRegistration::create([
            'event_id' => $event->id,
            'ticket_code' => 'DRN-TEST1',
            'name' => 'Michael Christian',
            'phone' => '+6281234567890',
            'category' => 'SMP',
            'origin' => 'SMPN 1 Sawangan',
            'status' => 'attended',
            'attended_at' => now(),
            'scanned_by' => 'Panitia Test',
        ]);

        EventRegistration::create([
            'event_id' => $event->id,
            'ticket_code' => 'DRN-TEST2',
            'name' => 'Sarah Jessica',
            'phone' => '+6289876543210',
            'category' => 'SMA',
            'origin' => 'SMAN 2 Depok',
            'status' => 'registered',
        ]);

        // 1. Test Scanner Page loads successfully with status 200
        $response = $this->actingAs($user)->get("/admin/events/scan/{$event->id}");
        $response->assertStatus(200);
        $response->assertSee('Daftar Anak-anak & Peserta Terdaftar', false);
        $response->assertSee('Download Laporan PDF');

        // 2. Test Scanner Alias /scanner/{event_id?}
        $aliasResponse = $this->actingAs($user)->get("/scanner/{$event->id}");
        $aliasResponse->assertStatus(200);

        // 3. Test Export PDF (Full)
        $pdfResponse = $this->actingAs($user)->get("/admin/events/{$event->id}/export-pdf?scope=all");
        $pdfResponse->assertStatus(200);
        $this->assertEquals('application/pdf', $pdfResponse->headers->get('content-type'));

        // 4. Test Export PDF (Attended Only)
        $pdfAttended = $this->actingAs($user)->get("/admin/events/{$event->id}/export-pdf?scope=attended");
        $pdfAttended->assertStatus(200);
        $this->assertEquals('application/pdf', $pdfAttended->headers->get('content-type'));

        // 5. Test Export PDF (Registered Only)
        $pdfPending = $this->actingAs($user)->get("/admin/events/{$event->id}/export-pdf?scope=registered");
        $pdfPending->assertStatus(200);
        $this->assertEquals('application/pdf', $pdfPending->headers->get('content-type'));

        // 6. Test Export PDF (Category SMP)
        $pdfCategory = $this->actingAs($user)->get("/admin/events/{$event->id}/export-pdf?category=SMP");
        $pdfCategory->assertStatus(200);
        $this->assertEquals('application/pdf', $pdfCategory->headers->get('content-type'));

        // 7. Test AJAX Toggle Attendance
        $attendee = EventRegistration::where('ticket_code', 'DRN-TEST2')->first();
        $this->assertEquals('registered', $attendee->status);

        $toggleRes = $this->actingAs($user)->postJson("/admin/events/participants/{$attendee->id}/toggle");
        $toggleRes->assertStatus(200);
        $toggleRes->assertJsonFragment(['status' => 'attended', 'success' => true]);

        $attendee->refresh();
        $this->assertEquals('attended', $attendee->status);
    }
}
