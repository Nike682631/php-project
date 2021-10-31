<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use App\CompanyCertificate;

class CertificateUploadTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUploadCertificate()
    {
        $this->withoutExceptionHandling();

        config()->set('filesystems.disks.media', [
            'driver' => 'local',
            'root' => __DIR__.'/../../temp',
        ]);

        config()->set('medialibrary.default_filesystem', 'media');

        $certificate = factory(CompanyCertificate::class)->create();

        $thumbnail = \Illuminate\Http\Testing\File::image('test-thumbnail.jpg');
        $file = \Illuminate\Http\Testing\File::create('test-certfile.docx');

        $certificate->addMedia($thumbnail)->toMediaCollection('CompanyCertificateThumbnail');
        $certificate->addMedia($file)->toMediaCollection('CompanyCertificateFile');

        $this->assertFileExists($certificate->getMedia('CompanyCertificateThumbnail')->first()->getPath());
        $this->assertFileExists($certificate->getMedia('CompanyCertificateFile')->first()->getPath());
    }
}
