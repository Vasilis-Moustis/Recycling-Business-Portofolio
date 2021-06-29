package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class partner2 extends AppCompatActivity {

    private Button p2b;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_partner2);

        p2b = (Button) findViewById(R.id.p2b);
        p2b.setOnClickListener(new View.OnClickListener() {
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