package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class partner5 extends AppCompatActivity {

    private Button p5b;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_partner5);

        p5b = (Button) findViewById(R.id.p5b);
        p5b.setOnClickListener(new View.OnClickListener() {
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