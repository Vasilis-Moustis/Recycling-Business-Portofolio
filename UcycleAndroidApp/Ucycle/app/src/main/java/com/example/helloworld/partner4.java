package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class partner4 extends AppCompatActivity {

    private Button p4b;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_partner4);

        p4b = (Button) findViewById(R.id.p4b);
        p4b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                showSponsors();
            }
        });

    }

    private void showSponsors() {
        Intent intent = new Intent(this, Oursponsors.class);
        startActivity(intent);
    }

}