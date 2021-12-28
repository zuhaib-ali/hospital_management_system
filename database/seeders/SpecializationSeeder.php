<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            'name' => 'Anesthesiologist',
            'description' => 'A doctor who gives anesthetics to a patient'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Cardiologist',
            'description' => 'A doctor who studies or treats heart diseases'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Dentist',
            'description' => 'Someone whose job is to treat people’s teeth'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Dermatology',
            'description' => 'Dermatologists are physicians who treat adult and pediatric patients with disorders of the skin, hair, nails, and adjacent mucous membranes. They diagnose everything from skin cancer, tumors, inflammatory diseases of the skin, and infectious diseases. They also perform skin biopsies and dermatological surgical procedures.'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Endocrinologist',
            'description' => 'A specially trained doctor who has a basic training in Internal Medicine as well'
        ]);

        DB::table('specializations')->insert([
            'name' => 'General practitioner',
            'description' => 'A medical doctor who treats acute and chronic illnesses and provides preventive care and health education to patients'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Nephrologist',
            'description' => 'A physician who studies and deals with nephrology'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Surgeon',
            'description' => 'A doctor who does operations in a hospital'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Obstetrician',
            'description' => 'A doctor who has special training in obstetrics'
        ]);

        DB::table('specializations')->insert([
            'name' => 'ENT Specialist',
            'description' => 'A surgical sub-specialty within medicine that deals with conditions of the ear, nose, and throat and related structures of the head and neck'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Parasitologist',
            'description' => 'A scientist who studies parasites and their biology and pathology, such as the parasitic diseases caused by them'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Pathologist',
            'description' => 'A physician/ medical doctor who specializes in pathology, which is the diagnosing of disease using organs, tissue, and body fluids'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Pediatrician',
            'description' => 'A doctor who deals with children and their illnesses'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Podiatrist',
            'description' => 'A doctor who takes care of people’s feet and treats foot diseases'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Psychiatrist',
            'description' => 'A doctor trained in the treatment of mental illness'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Rheumatologist',
            'description' => 'An internist or pediatrician who received further training in the diagnosis and treatment of musculoskeletal disease and systemic autoimmune conditions commonly referred to as rheumatic diseases'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Urologist',
            'description' => 'A doctor who treats conditions relating to the urinary system and men’s sexual organs'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Veterinarian',
            'description' => 'Someone who is trained to give medical care and treatment to sick animals'
        ]);


        DB::table('specializations')->insert([
            'name' => 'Optometrist',
            'description' => 'Someone who tests people’s eyes and orders glasses for them'
        ]);


        DB::table('specializations')->insert([
            'name' => 'Radiologist',
            'description' => 'A hospital doctor who is trained in the use of radiation to treat people'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Coroner',
            'description' => 'An official whose job is to discover the cause of someone’s death, especially if they died in a sudden or unusual way'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Chiropractor',
            'description' => 'Someone who treats physical problems using chiropractic'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Clinician',
            'description' => 'A doctor who treats and examines people, rather than one who does research'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Dermatologist',
            'description' => 'A doctor who treats people who have skin diseases'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Gynaecologist',
            'description' => 'A doctor who treats medical conditions and diseases that affect women and their reproductive organs'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Herbalist',
            'description' => 'Someone who grows, sells, or uses herbs, especially to treat illness'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Doctor',
            'description' => '	Someone whose job is to treat people who are ill or injured. When written as a title, the abbreviation of doctor is Dr.'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Occupational therapist',
            'description' => 'Someone who uses the methods of occupational therapy to treat people who have been ill or injured'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Paramedic',
            'description' => 'Someone who is trained to give medical treatment to people at the place where an accident has happened'
        ]);

        DB::table('specializations')->insert([
            'name' => 'Quack',
            'description' => 'A doctor who is not very good, or someone who cheats people by pretending to be a doctor'
        ]);

    }
}
