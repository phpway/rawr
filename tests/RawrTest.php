<?php

use \Beryllium\Rawr\Rawr;

class RawrTest extends \PHPUnit_Framework_TestCase
{
    public function testRawr()
    {
        $rawr = $this->getRawr();
        $this->assertInstanceOf('Beryllium\Rawr\Rawr', $rawr);
        $this->assertTrue($rawr->isReady());
    }

    public function testCR2PreviewListing()
    {
        $rawr     = $this->getRawr();
        $actual   = $rawr->listPreviews(ASSETS_DIR . '/TEST1.CR2');
        $expected = array(
            array(
                'index'  => 1,
                'type'   => 'image/jpeg',
                'height' => 120,
                'width'  => 160,
                'size'   => 14416,
            ),
            array(
                'index'  => 2,
                'type'   => 'image/tiff',
                'height' => 432,
                'width'  => 668,
                'size'   => 1731456,
            ),
            array(
                'index'  => 3,
                'type'   => 'image/jpeg',
                'height' => 3456,
                'width'  => 5184,
                'size'   => 1869241,
            ),
        );
        $this->assertSame($expected, $actual);
    }

    public function testCR2ExifListing()
    {
        $rawr     = $this->getRawr();
        $actual   = $rawr->listExifData(ASSETS_DIR . '/TEST1.CR2');
        $expected = array(
            'Exif.Image.ImageWidth'                      => '5184',
            'Exif.Image.ImageLength'                     => '3456',
            'Exif.Image.BitsPerSample'                   => '8 8 8',
            'Exif.Image.Compression'                     => '6',
            'Exif.Image.Make'                            => 'Canon',
            'Exif.Image.Model'                           => 'Canon EOS REBEL T3i',
            'Exif.Image.StripOffsets'                    => '69464',
            'Exif.Image.Orientation'                     => '1',
            'Exif.Image.StripByteCounts'                 => '1869241',
            'Exif.Image.XResolution'                     => '72/1',
            'Exif.Image.YResolution'                     => '72/1',
            'Exif.Image.ResolutionUnit'                  => '2',
            'Exif.Image.DateTime'                        => '2016:01:29 15:12:26',
            'Exif.Image.Artist'                          => null,
            'Exif.Image.XMLPacket'                       => '(Binary value suppressed)',
            'Exif.Image.Copyright'                       => null,
            'Exif.Image.ExifTag'                         => '434',
            'Exif.Photo.ExposureTime'                    => '1/250',
            'Exif.Photo.FNumber'                         => '18/10',
            'Exif.Photo.ExposureProgram'                 => '3',
            'Exif.Photo.ISOSpeedRatings'                 => '100',
            'Exif.Photo.SensitivityType'                 => '2',
            'Exif.Photo.RecommendedExposureIndex'        => '100',
            'Exif.Photo.ExifVersion'                     => '48 50 51 48',
            'Exif.Photo.DateTimeOriginal'                => '2016:01:29 15:12:26',
            'Exif.Photo.DateTimeDigitized'               => '2016:01:29 15:12:26',
            'Exif.Photo.ComponentsConfiguration'         => '1 2 3 0',
            'Exif.Photo.ShutterSpeedValue'               => '524288/65536',
            'Exif.Photo.ApertureValue'                   => '106496/65536',
            'Exif.Photo.ExposureBiasValue'               => '0/1',
            'Exif.Photo.MeteringMode'                    => '5',
            'Exif.Photo.Flash'                           => '16',
            'Exif.Photo.FocalLength'                     => '50/1',
            'Exif.Photo.MakerNote'                       => '(Binary value suppressed)',
            'Exif.MakerNote.Offset'                      => '984',
            'Exif.MakerNote.ByteOrder'                   => 'II',
            'Exif.CanonCs.Macro'                         => '2',
            'Exif.CanonCs.Selftimer'                     => '0',
            'Exif.CanonCs.Quality'                       => '4',
            'Exif.CanonCs.FlashMode'                     => '0',
            'Exif.CanonCs.DriveMode'                     => '1',
            'Exif.CanonCs.FocusMode'                     => '2',
            'Exif.CanonCs.ImageSize'                     => '65535',
            'Exif.CanonCs.EasyMode'                      => '1',
            'Exif.CanonCs.DigitalZoom'                   => '0',
            'Exif.CanonCs.Contrast'                      => '0',
            'Exif.CanonCs.Saturation'                    => '0',
            'Exif.CanonCs.Sharpness'                     => '32767',
            'Exif.CanonCs.ISOSpeed'                      => '15',
            'Exif.CanonCs.MeteringMode'                  => '3',
            'Exif.CanonCs.FocusType'                     => '2',
            'Exif.CanonCs.AFPoint'                       => '0',
            'Exif.CanonCs.ExposureProgram'               => '3',
            'Exif.CanonCs.LensType'                      => '29',
            'Exif.CanonCs.Lens'                          => '50 50 1',
            'Exif.CanonCs.MaxAperture'                   => '56',
            'Exif.CanonCs.MinAperture'                   => '288',
            'Exif.CanonCs.FlashActivity'                 => '0',
            'Exif.CanonCs.FlashDetails'                  => '0',
            'Exif.CanonCs.FocusContinuous'               => '65535',
            'Exif.CanonCs.AESetting'                     => '65535',
            'Exif.CanonCs.ImageStabilization'            => '65535',
            'Exif.CanonCs.DisplayAperture'               => '0',
            'Exif.CanonCs.ZoomSourceWidth'               => '0',
            'Exif.CanonCs.ZoomTargetWidth'               => '0',
            'Exif.CanonCs.SpotMeteringMode'              => '65535',
            'Exif.CanonCs.PhotoEffect'                   => '65535',
            'Exif.CanonCs.ManualFlashOutput'             => '0',
            'Exif.CanonCs.ColorTone'                     => '0',
            'Exif.CanonCs.SRAWQuality'                   => '0',
            'Exif.Canon.FocalLength'                     => '0 50 8902 19690',
            'Exif.CanonSi.ISOSpeed'                      => '160',
            'Exif.CanonSi.MeasuredEV'                    => '148',
            'Exif.CanonSi.TargetAperture'                => '52',
            'Exif.CanonSi.TargetShutterSpeed'            => '256',
            'Exif.CanonSi.WhiteBalance'                  => '0',
            'Exif.CanonSi.Sequence'                      => '0',
            'Exif.CanonSi.AFPointUsed'                   => '0',
            'Exif.CanonSi.FlashBias'                     => '0',
            'Exif.CanonSi.SubjectDistance'               => '0',
            'Exif.CanonSi.ApertureValue'                 => '56',
            'Exif.CanonSi.ShutterSpeedValue'             => '252',
            'Exif.CanonSi.MeasuredEV2'                   => '128',
            'Exif.Canon.ImageType'                       => 'Canon EOS REBEL T3i',
            'Exif.Canon.FirmwareVersion'                 => 'Firmware Version 1.0.1',
            'Exif.Canon.OwnerName'                       => null,
            'Exif.Canon.CameraInfo'                      => '(Binary value suppressed)',
            'Exif.Canon.ModelID'                         => '2147484294',
            'Exif.Canon.ThumbnailImageValidArea'         => '0 159 7 112',
            'Exif.Canon.AFInfo'                          => '96 2 9 9 5184 3456 5184 3456 139 139 139 196 238 196 139 139 139 186 186 186 127 231 127 186 186 186 64059 64650 64650 0 0 0 886 886 1477 0 418 65118 787 0 64749 418 65118 0 16 16 0 65535',
            'Exif.Canon.OriginalDecisionDataOffset'      => '0',
            'Exif.CanonFi.FileNumber'                    => '0',
            'Exif.CanonFi.BracketMode'                   => '0',
            'Exif.CanonFi.BracketValue'                  => '0',
            'Exif.CanonFi.BracketShotNumber'             => '0',
            'Exif.CanonFi.RawJpgQuality'                 => '0',
            'Exif.CanonFi.RawJpgSize'                    => '0',
            'Exif.CanonFi.NoiseReduction'                => '0',
            'Exif.CanonFi.WBBracketMode'                 => '0',
            'Exif.CanonFi.WBBracketValueAB'              => '0',
            'Exif.CanonFi.WBBracketValueGM'              => '0',
            'Exif.CanonFi.FilterEffect'                  => '-1',
            'Exif.CanonFi.ToningEffect'                  => '-1',
            'Exif.CanonFi.MacroMagnification'            => '163',
            'Exif.CanonFi.LiveViewShooting'              => '0',
            'Exif.CanonFi.FlashExposureLock'             => '0',
            'Exif.Canon.LensModel'                       => 'EF50mm f/1.8 II',
            'Exif.Canon.InternalSerialNumber'            => 'ZA1597305',
            'Exif.Canon.DustRemovalData'                 => '(Binary value suppressed)',
            'Exif.Canon.CustomFunctions'                 => '200 4 1 44 3 257 1 0 259 1 0 271 1 0 2 44 3 513 1 0 514 1 0 515 1 0 3 32 2 1294 1 0 1551 1 0 4 56 4 1793 1 0 1796 1 0 2065 1 0 2063 1 0',
            'Exif.CanonPr.ToneCurve'                     => '0',
            'Exif.CanonPr.Sharpness'                     => '3',
            'Exif.CanonPr.SharpnessFrequency'            => '0',
            'Exif.CanonPr.SensorRedLevel'                => '0',
            'Exif.CanonPr.SensorBlueLevel'               => '0',
            'Exif.CanonPr.WhiteBalanceRed'               => '0',
            'Exif.CanonPr.WhiteBalanceBlue'              => '0',
            'Exif.CanonPr.WhiteBalance'                  => '-1',
            'Exif.CanonPr.ColorTemperature'              => '5200',
            'Exif.CanonPr.PictureStyle'                  => '135',
            'Exif.CanonPr.DigitalGain'                   => '0',
            'Exif.CanonPr.WBShiftAB'                     => '0',
            'Exif.CanonPr.WBShiftGM'                     => '0',
            'Exif.Canon.MeasuredColor'                   => '12 377 1024 1024 864 0',
            'Exif.Canon.ColorSpace'                      => '1',
            'Exif.Canon.VRDOffset'                       => '0',
            'Exif.Canon.SensorInfo'                      => '34 5344 3516 1 1 152 56 5335 3511 0 0 0 0 0 0 0 0',
            'Exif.Canon.ColorData'                       => '10 790 1024 1024 374 531 1024 1024 522 370 1024 1024 762 1986 2533 2532 926 1977 3757 3756 1904 829 2285 2283 1667 1 0 260 256 265 0 1298 2864 2857 1692 590 197 197 29 88 591 592 992 1284 2307 2311 442 1713 3696 3691 2195 772 250 250 40 117 771 774 1281 1708 3001 3010 597 2635 1024 1024 1346 7382 2635 1024 1024 1346 7382 2635 1024 1024 1346 7382 2635 1024 1024 1346 7382 2635 1024 1024 1346 7382 2635 1024 1024 1346 7382 2645 1020 1027 1338 7484 462 1170 1170 869 7000 2171 1024 1024 1579 5200 2521 1024 1024 1353 7000 2346 1024 1024 1458 6000 1549 1024 1024 2330 3200 1896 1024 1024 2203 3729 2171 1024 1024 1579 5200 2439 1024 1024 1438 6333 2171 1024 1024 1579 5200 2171 1024 1024 1579 5200 2171 1024 1024 1579 5200 2171 1024 1024 1579 5200 2171 1024 1024 1579 5200 1022 1024 1024 1072 3935 1022 1024 1024 1072 3935 1022 1024 1024 1072 3935 1022 1024 1024 1072 3935 1022 1024 1024 1072 3935 65196 361 911 10900 65213 368 889 10000 65258 390 833 8300 65309 416 775 7000 65363 447 719 6000 65390 464 693 5600 65420 483 664 5200 65467 510 616 4700 65525 550 566 4200 42 590 525 3800 89 627 490 3500 146 677 450 3200 196 719 415 3000 239 767 394 2800 345 895 341 2400 500 2065 2080 2048 2048 2048 2048 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 6 7 18 24 0 1 0 0 0 0 0 0 0 0 0 0 1007 1439 2217 1393 21 15 12 11 19 7 14 6 3 3 3 0 2719 4321 6023 1606 15 15 11 6 12 1 8 7 8 2 6 0 32004 44546 49149 24294 348 315 124 37 52 19 36 54 34 30 183 1 0 0 0 32768 0 1024 1024 1024 2675 4018 7382 4129 65456 65439 3843 4065 85 103 4368 0 256 1 19759 3 31998 3 38502 2 59927 1024 1024 1024 0 0 0 0 0 8191 256 8191 256 512 666 452 478 675 394 838 0 0 0 0 2 33 65 96 128 160 191 223 255 0 37 73 110 147 183 212 233 255 1 0 121 0 16 32 64 96 128 192 0 65517 65517 65520 65517 65520 0 1000 1003 1003 1001 1004 1000 970 1160 0 2047 2047 2048 2048 13414 13926 11400 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 54762 0 10 144 210 256 256 256 256 256 0 10 144 210 256 256 256 256 256 121 144 144 1 1 177 210 5 20 43 86 140 255 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 37 44 87 241 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 254 0 124 0 967 4 0 63 385 13 0 824 40 0 320 0 0 0 0 0 0 0 0 1461 1024 793 0 0 0 0 0 0 30 81 65 0 0 0 0 0 0 100 399 1024 1024 775 0 965 5 0 0 0 0 63 129 72 121 29 78 64 22187 33107 29 22 255 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 2 38 74 110 147 183 212 233 255 0 0 0 0 0 0 0 0 0 100 0 144 1 210 0 0 0 0 0 0 0 37 73 110 147 183 212 233 255 21 23 24 24 24 24 26 30 33 35 39 41 45 48 48 47 45 44 43 42 40 40 40 43 52 62 79 94 114 148 173 210 247 253 249 237 226 205 175 142 93 66 49 36 28 19 14 10 6 4 2 1 0 0 0 0 0 0 0 0 0 0 0 2 255 12 129 72 22187 33107 0 0 0 0 0 29 255 22 380 18 0 844 46 0 320 0 0 121 0 0 26 0 85 0 0 0 0 0 0 0 0 0 80 0 75 0 0 100 0 100 100 0 100 100 0 100 0 100 0 6 1 0 0 85 0 129 72 22187 33107 0 0 0 0 0 29 255 22 965 5 0 0 0 0 63 22187 33107 610 129 0 0 0 0 0 85 0 0 37 73 110 147 183 212 233 255 0 0 399 1024 1024 775',
            'Exif.Photo.UserComment'                     => '(Binary value suppressed)',
            'Exif.Photo.SubSecTime'                      => '00',
            'Exif.Photo.SubSecTimeOriginal'              => '00',
            'Exif.Photo.SubSecTimeDigitized'             => '00',
            'Exif.Photo.FlashpixVersion'                 => '48 49 48 48',
            'Exif.Photo.ColorSpace'                      => '1',
            'Exif.Photo.PixelXDimension'                 => '5184',
            'Exif.Photo.PixelYDimension'                 => '3456',
            'Exif.Photo.InteroperabilityTag'             => '46320',
            'Exif.Iop.InteroperabilityIndex'             => 'R98',
            'Exif.Iop.InteroperabilityVersion'           => '48 49 48 48',
            'Exif.Photo.FocalPlaneXResolution'           => '5184000/905',
            'Exif.Photo.FocalPlaneYResolution'           => '3456000/595',
            'Exif.Photo.FocalPlaneResolutionUnit'        => '2',
            'Exif.Photo.CustomRendered'                  => '0',
            'Exif.Photo.ExposureMode'                    => '0',
            'Exif.Photo.WhiteBalance'                    => '0',
            'Exif.Photo.SceneCaptureType'                => '0',
            'Exif.Photo.CameraOwnerName'                 => null,
            'Exif.Photo.BodySerialNumber'                => '102131001548',
            'Exif.Photo.LensSpecification'               => '50/1 50/1 0/0 0/0',
            'Exif.Photo.LensModel'                       => 'EF50mm f/1.8 II',
            'Exif.Photo.LensSerialNumber'                => '0000000000',
            'Exif.Thumbnail.JPEGInterchangeFormat'       => '55048',
            'Exif.Thumbnail.JPEGInterchangeFormatLength' => '14416',
            'Exif.Image2.ImageWidth'                     => '668',
            'Exif.Image2.ImageLength'                    => '432',
            'Exif.Image2.BitsPerSample'                  => '16 16 16',
            'Exif.Image2.Compression'                    => '1',
            'Exif.Image2.PhotometricInterpretation'      => '2',
            'Exif.Image2.StripOffsets'                   => '1938708',
            'Exif.Image2.SamplesPerPixel'                => '3',
            'Exif.Image2.RowsPerStrip'                   => '432',
            'Exif.Image2.StripByteCounts'                => '1731456',
            'Exif.Image2.PlanarConfiguration'            => '1',
            'Exif.Image3.Compression'                    => '6',
            'Exif.Image3.StripOffsets'                   => '3675412',
            'Exif.Image3.StripByteCounts'                => '19975955',
            'Xmp.xmp.Rating'                             => '0',
        );

        foreach ($expected as $key => $value) {
            $this->assertSame($value, $actual[$key], 'Value mismatch for key ' . $key);
        }
    }

    public function testCR2Preview3Extraction()
    {
        $rawr    = $this->getRawr();
        $preview = $rawr->extractPreview(ASSETS_DIR . '/TEST1.CR2', 3);
        $this->assertFileExists($preview);
        $this->assertSame('TEST1-preview3.jpg', basename($preview));
        $actual   = getimagesize($preview);
        $expected = array(
            0          => 5184,
            1          => 3456,
            2          => 2,
            3          => 'width="5184" height="3456"',
            'bits'     => 8,
            'channels' => 3,
            'mime'     => 'image/jpeg',
        );
        $this->assertSame($expected, $actual);
    }

    public function testCR2Preview2Extraction()
    {
        $rawr    = $this->getRawr();
        $preview = $rawr->extractPreview(ASSETS_DIR . '/TEST1.CR2', 2);
        $this->assertFileExists($preview);
        $this->assertSame('TEST1-preview2.tif', basename($preview));
        $actual   = getimagesize($preview);
        $expected = array(
            0      => 668,
            1      => 432,
            2      => 7,
            3      => 'width="668" height="432"',
            'mime' => 'image/tiff',
        );
        $this->assertSame($expected, $actual);
    }

    public function testCR2ExifTransfer()
    {
        if (!extension_loaded('exif')) {
            $this->markTestSkipped('The PHP exif extension is required to test exif data');
        }

        $rawr    = $this->getRawr();
        $preview = $rawr->extractPreview(ASSETS_DIR . '/TEST1.CR2', 3);
        $expected = array(
            'FileName'      => 'TEST1-preview3.jpg',
            'FileSize'      => 1869241,
            'FileType'      => 2,
            'MimeType'      => 'image/jpeg',
            'SectionsFound' => '',
            'COMPUTED'      => array(
                'html'    => 'width="5184" height="3456"',
                'Height'  => 3456,
                'Width'   => 5184,
                'IsColor' => 1,
            ),
        );
        $actual = exif_read_data($preview);
        unset($actual['FileDateTime']);
        $this->assertSame($expected, $actual);
        $rawr->transferExifData(ASSETS_DIR . '/TEST1.CR2', $preview);
        $actual   = exif_read_data($preview);
        $expected = array(
            'FileName'                 => 'TEST1-preview3.jpg',
            'FileSize'                 => 1896069,
            'FileType'                 => 2,
            'MimeType'                 => 'image/jpeg',
            'SectionsFound'            => 'ANY_TAG, IFD0, THUMBNAIL, EXIF, MAKERNOTE',
            'COMPUTED'                 => array(
                'html'                => 'width="5184" height="3456"',
                'Height'              => 3456,
                'Width'               => 5184,
                'IsColor'             => 1,
                'ByteOrderMotorola'   => 0,
                'CCDWidth'            => '22mm',
                'ApertureFNumber'     => 'f/1.8',
                'UserComment'         => null,
                'UserCommentEncoding' => 'ASCII',
                'Thumbnail.FileType'  => 2,
                'Thumbnail.MimeType'  => 'image/jpeg',
            ),
            'Make'                     => 'Canon',
            'Model'                    => 'Canon EOS REBEL T3i',
            'Orientation'              => 1,
            'XResolution'              => '72/1',
            'YResolution'              => '72/1',
            'ResolutionUnit'           => 2,
            'DateTime'                 => '2016:01:29 15:12:26',
            'Artist'                   => null,
            'YCbCrPositioning'         => 1,
            'Copyright'                => null,
            'Exif_IFD_Pointer'         => 208,
            'THUMBNAIL'                => array(
                'Compression'                 => 6,
                'XResolution'                 => '72/1',
                'YResolution'                 => '72/1',
                'ResolutionUnit'              => 2,
                'JPEGInterchangeFormat'       => 7870,
                'JPEGInterchangeFormatLength' => 14416,
            ),
            'ExposureTime'             => '1/250',
            'FNumber'                  => '9/5',
            'ExposureProgram'          => 3,
            'ISOSpeedRatings'          => 100,
            'ExifVersion'              => '0230',
            'DateTimeOriginal'         => '2016:01:29 15:12:26',
            'DateTimeDigitized'        => '2016:01:29 15:12:26',
            'ShutterSpeedValue'        => '8/1',
            'ApertureValue'            => '13166/7763',
            'ExposureBiasValue'        => '0/1',
            'MeteringMode'             => 5,
            'FocalLength'              => '50/1',
            'FlashPixVersion'          => '0100',
            'ColorSpace'               => 1,
            'ExifImageWidth'           => 5184,
            'ExifImageLength'          => 3456,
            'FocalPlaneXResolution'    => '1036800/181',
            'FocalPlaneYResolution'    => '691200/119',
            'FocalPlaneResolutionUnit' => 2,
            'CustomRendered'           => 0,
            'ExposureMode'             => 0,
            'WhiteBalance'             => 0,
            'SceneCaptureType'         => 0,
            'Contrast'                 => 0,
            'Saturation'               => 0,
            'Sharpness'                => 2,
            'UndefinedTag:0xA434'      => 'EF50mm f/1.8 II',
            'ImageType'                => 'Canon EOS REBEL T3i',
            'FirmwareVersion'          => 'Firmware Version 1.0.1',
            'UndefinedTag:0x0095'      => 'EF50mm f/1.8 II',
            'UndefinedTag:0x0096'      => 'ZA1597305',
        );
        $actual = array_intersect_key($actual, $expected);
        $this->assertSame($expected, $actual);
        $expected = array(
            'Exif.Image.Make'                            => 'Canon',
            'Exif.Image.Model'                           => 'Canon EOS REBEL T3i',
            'Exif.Image.Orientation'                     => '1',
            'Exif.Image.XResolution'                     => '72/1',
            'Exif.Image.YResolution'                     => '72/1',
            'Exif.Image.ResolutionUnit'                  => '2',
            'Exif.Image.DateTime'                        => '2016:01:29 15:12:26',
            'Exif.Image.Artist'                          => null,
            'Exif.Image.YCbCrPositioning'                => '1',
            'Exif.Image.Copyright'                       => null,
            'Exif.Image.ExifTag'                         => '208',
            'Exif.Photo.ExposureTime'                    => '1/250',
            'Exif.Photo.FNumber'                         => '9/5',
            'Exif.Photo.ExposureProgram'                 => '3',
            'Exif.Photo.ISOSpeedRatings'                 => '100',
            'Exif.Photo.SensitivityType'                 => '2',
            'Exif.Photo.RecommendedExposureIndex'        => '100',
            'Exif.Photo.ExifVersion'                     => '48 50 51 48',
            'Exif.Photo.DateTimeOriginal'                => '2016:01:29 15:12:26',
            'Exif.Photo.DateTimeDigitized'               => '2016:01:29 15:12:26',
            'Exif.Photo.ComponentsConfiguration'         => '1 2 3 0',
            'Exif.Photo.ShutterSpeedValue'               => '8/1',
            'Exif.Photo.ApertureValue'                   => '13166/7763',
            'Exif.Photo.ExposureBiasValue'               => '0/1',
            'Exif.Photo.MeteringMode'                    => '5',
            'Exif.Photo.FocalLength'                     => '50/1',
            'Exif.Photo.MakerNote'                       => '(Binary value suppressed)',
            'Exif.MakerNote.Offset'                      => '770',
            'Exif.MakerNote.ByteOrder'                   => 'II',
            'Exif.CanonCs.Macro'                         => '2',
            'Exif.CanonCs.Selftimer'                     => '0',
            'Exif.CanonCs.Quality'                       => '4',
            'Exif.CanonCs.FlashMode'                     => '0',
            'Exif.CanonCs.DriveMode'                     => '1',
            'Exif.CanonCs.FocusMode'                     => '2',
            'Exif.CanonCs.ImageSize'                     => '65535',
            'Exif.CanonCs.EasyMode'                      => '1',
            'Exif.CanonCs.DigitalZoom'                   => '0',
            'Exif.CanonCs.Contrast'                      => '0',
            'Exif.CanonCs.Saturation'                    => '0',
            'Exif.CanonCs.Sharpness'                     => '32767',
            'Exif.CanonCs.ISOSpeed'                      => '15',
            'Exif.CanonCs.MeteringMode'                  => '3',
            'Exif.CanonCs.FocusType'                     => '2',
            'Exif.CanonCs.AFPoint'                       => '0',
            'Exif.CanonCs.ExposureProgram'               => '3',
            'Exif.CanonCs.LensType'                      => '29',
            'Exif.CanonCs.Lens'                          => '50 50 1',
            'Exif.CanonCs.MaxAperture'                   => '56',
            'Exif.CanonCs.MinAperture'                   => '288',
            'Exif.CanonCs.FlashActivity'                 => '0',
            'Exif.CanonCs.FlashDetails'                  => '0',
            'Exif.CanonCs.FocusContinuous'               => '65535',
            'Exif.CanonCs.AESetting'                     => '65535',
            'Exif.CanonCs.ImageStabilization'            => '65535',
            'Exif.CanonCs.DisplayAperture'               => '0',
            'Exif.CanonCs.ZoomSourceWidth'               => '0',
            'Exif.CanonCs.ZoomTargetWidth'               => '0',
            'Exif.CanonCs.SpotMeteringMode'              => '65535',
            'Exif.CanonCs.PhotoEffect'                   => '65535',
            'Exif.CanonCs.ManualFlashOutput'             => '0',
            'Exif.CanonCs.ColorTone'                     => '0',
            'Exif.CanonCs.SRAWQuality'                   => '0',
            'Exif.Canon.FocalLength'                     => '0 50 8902 19690',
            'Exif.CanonSi.ISOSpeed'                      => '160',
            'Exif.CanonSi.MeasuredEV'                    => '148',
            'Exif.CanonSi.TargetAperture'                => '52',
            'Exif.CanonSi.TargetShutterSpeed'            => '256',
            'Exif.CanonSi.WhiteBalance'                  => '0',
            'Exif.CanonSi.Sequence'                      => '0',
            'Exif.CanonSi.AFPointUsed'                   => '0',
            'Exif.CanonSi.FlashBias'                     => '0',
            'Exif.CanonSi.SubjectDistance'               => '0',
            'Exif.CanonSi.ApertureValue'                 => '56',
            'Exif.CanonSi.ShutterSpeedValue'             => '252',
            'Exif.CanonSi.MeasuredEV2'                   => '128',
            'Exif.Canon.ImageType'                       => 'Canon EOS REBEL T3i',
            'Exif.Canon.FirmwareVersion'                 => 'Firmware Version 1.0.1',
            'Exif.Canon.OwnerName'                       => null,
            'Exif.Canon.CameraInfo'                      => '(Binary value suppressed)',
            'Exif.Canon.ModelID'                         => '2147484294',
            'Exif.Canon.ThumbnailImageValidArea'         => '0 159 7 112',
            'Exif.Canon.AFInfo'                          => '96 2 9 9 5184 3456 5184 3456 139 139 139 196 238 196 139 139 139 186 186 186 127 231 127 186 186 186 64059 64650 64650 0 0 0 886 886 1477 0 418 65118 787 0 64749 418 65118 0 16 16 0 65535',
            'Exif.Canon.OriginalDecisionDataOffset'      => '0',
            'Exif.CanonFi.FileNumber'                    => '0',
            'Exif.CanonFi.BracketMode'                   => '0',
            'Exif.CanonFi.BracketValue'                  => '0',
            'Exif.CanonFi.BracketShotNumber'             => '0',
            'Exif.CanonFi.RawJpgQuality'                 => '0',
            'Exif.CanonFi.RawJpgSize'                    => '0',
            'Exif.CanonFi.NoiseReduction'                => '0',
            'Exif.CanonFi.WBBracketMode'                 => '0',
            'Exif.CanonFi.WBBracketValueAB'              => '0',
            'Exif.CanonFi.WBBracketValueGM'              => '0',
            'Exif.CanonFi.FilterEffect'                  => '-1',
            'Exif.CanonFi.ToningEffect'                  => '-1',
            'Exif.CanonFi.MacroMagnification'            => '163',
            'Exif.CanonFi.LiveViewShooting'              => '0',
            'Exif.CanonFi.FlashExposureLock'             => '0',
            'Exif.Canon.LensModel'                       => 'EF50mm f/1.8 II',
            'Exif.Canon.InternalSerialNumber'            => 'ZA1597305',
            'Exif.Canon.DustRemovalData'                 => '(Binary value suppressed)',
            'Exif.Canon.CustomFunctions'                 => '200 4 1 44 3 257 1 0 259 1 0 271 1 0 2 44 3 513 1 0 514 1 0 515 1 0 3 32 2 1294 1 0 1551 1 0 4 56 4 1793 1 0 1796 1 0 2065 1 0 2063 1 0',
            'Exif.CanonPr.ToneCurve'                     => '0',
            'Exif.CanonPr.Sharpness'                     => '3',
            'Exif.CanonPr.SharpnessFrequency'            => '0',
            'Exif.CanonPr.SensorRedLevel'                => '0',
            'Exif.CanonPr.SensorBlueLevel'               => '0',
            'Exif.CanonPr.WhiteBalanceRed'               => '0',
            'Exif.CanonPr.WhiteBalanceBlue'              => '0',
            'Exif.CanonPr.WhiteBalance'                  => '-1',
            'Exif.CanonPr.ColorTemperature'              => '5200',
            'Exif.CanonPr.PictureStyle'                  => '135',
            'Exif.CanonPr.DigitalGain'                   => '0',
            'Exif.CanonPr.WBShiftAB'                     => '0',
            'Exif.CanonPr.WBShiftGM'                     => '0',
            'Exif.Canon.MeasuredColor'                   => '12 377 1024 1024 864 0',
            'Exif.Canon.ColorSpace'                      => '1',
            'Exif.Canon.VRDOffset'                       => '0',
            'Exif.Canon.SensorInfo'                      => '34 5344 3516 1 1 152 56 5335 3511 0 0 0 0 0 0 0 0',
            'Exif.Photo.UserComment'                     => 'charset="Ascii"',
            'Exif.Photo.SubSecTime'                      => '00',
            'Exif.Photo.SubSecTimeOriginal'              => '00',
            'Exif.Photo.SubSecTimeDigitized'             => '00',
            'Exif.Photo.FlashpixVersion'                 => '48 49 48 48',
            'Exif.Photo.ColorSpace'                      => '1',
            'Exif.Photo.PixelXDimension'                 => '5184',
            'Exif.Photo.PixelYDimension'                 => '3456',
            'Exif.Photo.FocalPlaneXResolution'           => '1036800/181',
            'Exif.Photo.FocalPlaneYResolution'           => '691200/119',
            'Exif.Photo.FocalPlaneResolutionUnit'        => '2',
            'Exif.Photo.CustomRendered'                  => '0',
            'Exif.Photo.ExposureMode'                    => '0',
            'Exif.Photo.WhiteBalance'                    => '0',
            'Exif.Photo.SceneCaptureType'                => '0',
            'Exif.Photo.Contrast'                        => '0',
            'Exif.Photo.Saturation'                      => '0',
            'Exif.Photo.Sharpness'                       => '2',
            'Exif.Photo.CameraOwnerName'                 => null,
            'Exif.Photo.BodySerialNumber'                => '102131001548',
            'Exif.Photo.LensSpecification'               => '50/1 50/1 0/0 0/0',
            'Exif.Photo.LensModel'                       => 'EF50mm f/1.8 II',
            'Exif.Photo.LensSerialNumber'                => '0000000000',
            'Exif.Thumbnail.Compression'                 => '6',
            'Exif.Thumbnail.XResolution'                 => '72/1',
            'Exif.Thumbnail.YResolution'                 => '72/1',
            'Exif.Thumbnail.ResolutionUnit'              => '2',
            'Exif.Thumbnail.JPEGInterchangeFormat'       => '7870',
            'Exif.Thumbnail.JPEGInterchangeFormatLength' => '14416',
            'Xmp.aux.Lens'                               => '50.0 mm',
            'Xmp.exif.ComponentsConfiguration'           => '1, 2, 3, 0',
            'Xmp.exif.Flash'                             => 'type="Struct"',
            'Xmp.exif.Flash/exif:Fired'                  => 'False',
            'Xmp.exif.Flash/exif:Function'               => 'False',
            'Xmp.exif.Flash/exif:Mode'                   => '2',
            'Xmp.exif.Flash/exif:RedEyeMode'             => 'False',
            'Xmp.exif.Flash/exif:Return'                 => '0',
            'Xmp.exifEX.InteroperabilityIndex'           => 'R98',
            'Xmp.pmi.sequenceNumber'                     => '0',
            'Xmp.tiff.BitsPerSample'                     => '8, 8, 8',
            'Xmp.tiff.Compression'                       => '6',
            'Xmp.tiff.ImageLength'                       => '3456',
            'Xmp.tiff.ImageWidth'                        => '5184',
            'Xmp.tiff.PhotometricInterpretation'         => '2',
            'Xmp.tiff.PlanarConfiguration'               => '1',
            'Xmp.tiff.SamplesPerPixel'                   => '3',
            'Xmp.xmp.Rating'                             => '0',
            'Xmp.crs.ToneCurve'                          => 'Standard',
        );
        $actual = $rawr->listExifData($preview);
        unset($actual['Exif.Canon.ColorData']);
        $this->assertSame($expected, $actual);
    }

    protected function getRawr()
    {
        return new Rawr(SANDBOX_DIR, EXIV2_BIN, EXIFTOOL_BIN);
    }
}
